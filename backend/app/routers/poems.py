from fastapi import APIRouter, HTTPException, Query
from app.data.poems_data import POEMS, POETS
from app.data.locations_db import get_location
from app.location_resolver import resolve_poem_locations, extract_locations_from_text

router = APIRouter(prefix="/api/poems", tags=["poems"])


def _build_poem_response(poem: dict) -> dict:
    """Enrich a poem dict with resolved location objects."""
    locs = poem.get("locations", [])
    resolved = resolve_poem_locations(locs)
    return {**poem, "resolved_locations": resolved}


@router.get("/")
def list_poems(
    author: str | None = Query(None, description="Filter by poet name"),
    location: str | None = Query(None, description="Filter by location name"),
    skip: int = 0,
    limit: int = 100,
):
    """Return all poems, optionally filtered by author or location."""
    result = POEMS
    if author:
        result = [p for p in result if author in p["author"]]
    if location:
        result = [
            p for p in result if any(location in loc for loc in p.get("locations", []))
        ]
    return {
        "total": len(result),
        "poems": [_build_poem_response(p) for p in result[skip : skip + limit]],
    }


@router.get("/{poem_id}")
def get_poem(poem_id: int):
    """Return a single poem by ID."""
    for poem in POEMS:
        if poem["id"] == poem_id:
            return _build_poem_response(poem)
    raise HTTPException(status_code=404, detail=f"Poem {poem_id} not found")


@router.get("/search/locations")
def poems_by_location(place: str = Query(..., description="Place name to search")):
    """Find all poems that mention a given location."""
    matches = []
    for poem in POEMS:
        locs = poem.get("locations", [])
        # Also scan content for untagged mentions
        content_locs = extract_locations_from_text(poem["content"])
        all_locs = list(set(locs + content_locs))
        if any(place in loc for loc in all_locs):
            matches.append(_build_poem_response(poem))
    return {"place": place, "count": len(matches), "poems": matches}
