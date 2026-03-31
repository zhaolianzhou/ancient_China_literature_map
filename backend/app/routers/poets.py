from fastapi import APIRouter, HTTPException
from app.data.poems_data import POEMS, POETS
from app.data.locations_db import get_location
from app.location_resolver import resolve_poem_locations

router = APIRouter(prefix="/api/poets", tags=["poets"])


def _build_trace(poet_name: str) -> list[dict]:
    """
    Build ordered travel trace for a poet based on their poems.
    Poems are sorted by written_year, then locations within each poem.
    Returns list of TracePoint dicts with sequence numbers.
    """
    poet_poems = [p for p in POEMS if p["author"] == poet_name]
    poet_poems.sort(key=lambda p: (p.get("written_year") or 999, p["id"]))

    trace = []
    seq = 0
    seen_loc_poem = set()

    for poem in poet_poems:
        year = poem.get("written_year")
        locs = resolve_poem_locations(poem.get("locations", []))
        for loc in locs:
            key = (loc["name"], poem["id"])
            if key in seen_loc_poem:
                continue
            seen_loc_poem.add(key)
            trace.append(
                {
                    "sequence": seq,
                    "poem_id": poem["id"],
                    "poem_title": poem["title"],
                    "year": year,
                    "location": {
                        "name": loc["name"],
                        "ancient_name": loc.get("ancient", loc["name"]),
                        "modern_name": loc.get("modern", ""),
                        "lat": loc["lat"],
                        "lng": loc["lng"],
                        "description": loc.get("desc", ""),
                    },
                }
            )
            seq += 1

    return trace


@router.get("/")
def list_poets():
    """Return all poets with basic info."""
    result = []
    for name, info in POETS.items():
        poem_count = sum(1 for p in POEMS if p["author"] == name)
        result.append(
            {
                "name": name,
                "birth_year": info.get("birth_year"),
                "death_year": info.get("death_year"),
                "native_place": info.get("native_place"),
                "style": info.get("style"),
                "poem_count": poem_count,
            }
        )
    result.sort(key=lambda x: x.get("birth_year") or 999)
    return {"total": len(result), "poets": result}


@router.get("/{poet_name}")
def get_poet(poet_name: str):
    """Return detailed info and all poems for a poet."""
    if poet_name not in POETS:
        raise HTTPException(status_code=404, detail=f"Poet '{poet_name}' not found")

    info = POETS[poet_name]
    poems = [p for p in POEMS if p["author"] == poet_name]

    # Enrich poems with resolved locations
    enriched_poems = []
    for poem in poems:
        locs = resolve_poem_locations(poem.get("locations", []))
        enriched_poems.append(
            {
                **poem,
                "resolved_locations": locs,
            }
        )

    return {
        "name": poet_name,
        "birth_year": info.get("birth_year"),
        "death_year": info.get("death_year"),
        "native_place": info.get("native_place"),
        "biography": info.get("biography"),
        "style": info.get("style"),
        "poems": enriched_poems,
    }


@router.get("/{poet_name}/trace")
def get_poet_trace(poet_name: str):
    """
    Return the travel trace for a poet.
    The trace is a chronological list of locations extracted from their poems.
    """
    if poet_name not in POETS:
        raise HTTPException(status_code=404, detail=f"Poet '{poet_name}' not found")

    info = POETS[poet_name]
    trace = _build_trace(poet_name)

    return {
        "poet": poet_name,
        "birth_year": info.get("birth_year"),
        "death_year": info.get("death_year"),
        "native_place": info.get("native_place"),
        "biography": info.get("biography"),
        "style": info.get("style"),
        "trace_count": len(trace),
        "trace": trace,
    }
