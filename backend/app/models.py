from pydantic import BaseModel
from typing import Optional


class Location(BaseModel):
    name: str
    ancient_name: Optional[str] = None
    modern_name: Optional[str] = None
    lat: float
    lng: float
    description: Optional[str] = None


class Poem(BaseModel):
    id: int
    title: str
    author: str
    dynasty: str
    content: str
    translation: Optional[str] = None
    locations: list[Location] = []
    written_year: Optional[int] = None
    occasion: Optional[str] = None


class Poet(BaseModel):
    name: str
    birth_year: Optional[int] = None
    death_year: Optional[int] = None
    native_place: Optional[str] = None
    biography: Optional[str] = None
    poems: list[Poem] = []
    travel_trace: list[Location] = []


class TracePoint(BaseModel):
    location: Location
    poem_id: int
    poem_title: str
    year: Optional[int] = None
    sequence: int


class PoetTrace(BaseModel):
    poet: str
    birth_year: Optional[int]
    death_year: Optional[int]
    trace: list[TracePoint]
