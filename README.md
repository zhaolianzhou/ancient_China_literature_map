# 唐诗行迹地图 — Ancient China Literature Travel Map

Visualises the **travelling traces of Tang Dynasty poets** extracted from their poems in **唐诗三百首** (300 Tang Poems).

Select one or more poets in the sidebar and see their journeys drawn on the map — each numbered waypoint links to the poem that places them there.

---

## Architecture

```
ancient_China_literature_map/
├── backend/          Python · FastAPI
│   ├── app/
│   │   ├── main.py            FastAPI app + CORS
│   │   ├── models.py          Pydantic schemas
│   │   ├── location_resolver.py  Curated DB + Nominatim geocoding
│   │   ├── data/
│   │   │   ├── poems_data.py  70 poems from 唐诗三百首, 22 poets
│   │   │   └── locations_db.py  80 curated Tang Dynasty locations
│   │   └── routers/
│   │       ├── poets.py       /api/poets  — list, detail, travel trace
│   │       ├── poems.py       /api/poems  — list, search, filter
│   │       └── locations.py   /api/locations — heatmap, geocode
│   └── requirements.txt
│
└── frontend/         TypeScript · React · Vite · Leaflet.js
    └── src/
        ├── App.tsx            Main layout + state
        ├── api/client.ts      Axios API client
        ├── types/index.ts     TypeScript interfaces
        └── components/
            ├── TraceMap.tsx   Leaflet map — traces + heatmap
            ├── PoetPanel.tsx  Sidebar — poet list + trace timeline
            └── PoemDetail.tsx Popup — poem text + location info
```

---

## Quick Start

### 1. Backend

```bash
cd backend
pip3 install -r requirements.txt
./start.sh
# API: http://localhost:8000
# Docs: http://localhost:8000/docs
```

### 2. Frontend

```bash
cd frontend
npm install
npm run dev
# App: http://localhost:5173
```

---

## Features

- **Travel trace map** — select any poet to draw their chronological journey
- **Compare poets** — overlay multiple poets' traces simultaneously with distinct colours
- **Poem popups** — click any waypoint to read the full poem that placed the poet there
- **Location heatmap** — see which places appear most frequently across all poems
- **Location detail** — click a heatmap dot to list every poem associated with that place
- **Nominatim fallback** — unknown place names are geocoded via OpenStreetMap

## Data

| Metric | Count |
|--------|-------|
| Poems  | 70 (from 唐诗三百首) |
| Poets  | 22 |
| Curated locations | 80 |
| Unique locations in poems | 50 |
| Dynasty | Tang (唐) 618–907 AD |

Featured poets include 李白, 杜甫, 王维, 孟浩然, 王昌龄, 高适, 岑参, 白居易, 杜牧, 李商隐, and more.

## API Endpoints

| Method | Path | Description |
|--------|------|-------------|
| GET | `/api/poets/` | List all poets |
| GET | `/api/poets/{name}` | Poet detail + poems |
| GET | `/api/poets/{name}/trace` | Chronological travel trace |
| GET | `/api/poems/` | List/filter poems |
| GET | `/api/poems/{id}` | Single poem |
| GET | `/api/locations/` | All curated locations |
| GET | `/api/locations/heatmap` | Poem-count weighted heatmap |
| GET | `/api/locations/geocode?place=X` | Geocode a place name |
| GET | `/api/locations/{name}/poems` | Poems at a location |
| GET | `/api/stats` | Dataset statistics |
