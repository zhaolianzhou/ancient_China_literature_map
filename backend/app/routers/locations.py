from fastapi import APIRouter, HTTPException, Query
from app.data.locations_db import TANG_LOCATIONS, LOCATION_ALIASES, get_location
from app.data.poems_data import POEMS
from app.location_resolver import geocode_nominatim

router = APIRouter(prefix="/api/locations", tags=["locations"])


@router.get("/")
def list_locations():
    """Return all curated Tang Dynasty locations."""
    result = []
    for name, info in TANG_LOCATIONS.items():
        # Count how many poems mention this location
        poem_count = sum(
            1 for p in POEMS
            if name in p.get("locations", [])
        )
        result.append(
            {
                "name": name,
                "ancient_name": info.get("ancient", name),
                "modern_name": info.get("modern", ""),
                "lat": info["lat"],
                "lng": info["lng"],
                "description": info.get("desc", ""),
                "poem_count": poem_count,
            }
        )
    result.sort(key=lambda x: -x["poem_count"])
    return {"total": len(result), "locations": result}


@router.get("/geocode")
async def geocode(place: str = Query(..., description="Place name to geocode")):
    """
    Geocode a place name: check curated DB first, then Nominatim fallback.
    """
    loc = get_location(place)
    if loc:
        return {"source": "curated", "location": loc}

    result = await geocode_nominatim(place)
    if result:
        return {"source": "nominatim", "location": result}

    raise HTTPException(
        status_code=404,
        detail=f"Could not geocode '{place}'",
    )


@router.get("/heatmap")
def location_heatmap():
    """
    Return all locations with poem counts for heatmap display.
    Each location has lat, lng, and a weight (poem count).
    """
    counts: dict[str, int] = {}
    for poem in POEMS:
        for loc_name in poem.get("locations", []):
            canonical = LOCATION_ALIASES.get(loc_name, loc_name)
            counts[canonical] = counts.get(canonical, 0) + 1

    heatmap = []
    for name, count in counts.items():
        loc = get_location(name)
        if loc:
            heatmap.append(
                {
                    "name": name,
                    "lat": loc["lat"],
                    "lng": loc["lng"],
                    "weight": count,
                    "modern": loc.get("modern", ""),
                }
            )

    heatmap.sort(key=lambda x: -x["weight"])
    return {"total": len(heatmap), "heatmap": heatmap}


@router.get("/{location_name}/poems")
def poems_at_location(location_name: str):
    """Return all poems associated with a specific location."""
    loc = get_location(location_name)
    if not loc:
        raise HTTPException(
            status_code=404,
            detail=f"Location '{location_name}' not found",
        )

    matching_poems = [
        p for p in POEMS
        if location_name in p.get("locations", [])
        or any(LOCATION_ALIASES.get(a, a) == location_name for a in p.get("locations", []))
    ]

    return {
        "location": loc,
        "poem_count": len(matching_poems),
        "poems": matching_poems,
    }
