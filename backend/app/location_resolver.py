"""
Location resolver: maps place names in poems to lat/lng coordinates.
Primary source: curated TANG_LOCATIONS database.
Fallback: OpenStreetMap Nominatim geocoding API.
"""

import httpx
import asyncio
from app.data.locations_db import TANG_LOCATIONS, LOCATION_ALIASES, get_location


# In-memory cache for geocoded results
_geocode_cache: dict[str, dict | None] = {}


async def geocode_nominatim(place_name: str) -> dict | None:
    """
    Fallback geocoder using OSM Nominatim.
    Returns {lat, lng, display_name} or None.
    """
    if place_name in _geocode_cache:
        return _geocode_cache[place_name]

    query = f"{place_name} China"
    url = "https://nominatim.openstreetmap.org/search"
    params = {
        "q": query,
        "format": "json",
        "limit": 1,
        "accept-language": "zh-CN",
    }
    headers = {"User-Agent": "AncientChinaLiteratureMap/1.0"}

    try:
        async with httpx.AsyncClient(timeout=5.0) as client:
            resp = await client.get(url, params=params, headers=headers)
            resp.raise_for_status()
            results = resp.json()
            if results:
                result = results[0]
                entry = {
                    "name": place_name,
                    "lat": float(result["lat"]),
                    "lng": float(result["lon"]),
                    "modern": result.get("display_name", ""),
                    "ancient": place_name,
                    "desc": "Nominatim geocoded",
                }
                _geocode_cache[place_name] = entry
                return entry
    except Exception:
        pass

    _geocode_cache[place_name] = None
    return None


def resolve_location_sync(name: str) -> dict | None:
    """Synchronous lookup from curated database only."""
    return get_location(name)


async def resolve_location(name: str) -> dict | None:
    """
    Resolve a place name to coordinates.
    1. Check curated Tang Dynasty database.
    2. Fall back to Nominatim geocoding.
    """
    result = get_location(name)
    if result:
        return result

    # Try Nominatim fallback
    return await geocode_nominatim(name)


def resolve_poem_locations(location_names: list[str]) -> list[dict]:
    """
    Resolve all location names in a poem to coordinate dicts.
    Uses the synchronous curated database only.
    """
    resolved = []
    seen = set()
    for name in location_names:
        if name in seen:
            continue
        seen.add(name)
        loc = get_location(name)
        if loc:
            resolved.append(loc)
    return resolved


async def resolve_poem_locations_async(location_names: list[str]) -> list[dict]:
    """
    Resolve all location names in a poem to coordinate dicts.
    Uses curated database first, falls back to Nominatim.
    """
    resolved = []
    seen = set()
    tasks = []

    for name in location_names:
        if name in seen:
            continue
        seen.add(name)
        tasks.append(resolve_location(name))

    results = await asyncio.gather(*tasks)
    for result in results:
        if result:
            resolved.append(result)

    return resolved


def extract_locations_from_text(text: str) -> list[str]:
    """
    Simple keyword-based location extractor.
    Scans poem content for known place names.
    """
    found = []
    all_names = set(TANG_LOCATIONS.keys()) | set(LOCATION_ALIASES.keys())

    for name in all_names:
        if name in text:
            # Resolve alias to canonical
            canonical = LOCATION_ALIASES.get(name, name)
            if canonical not in found:
                found.append(canonical)

    return found
