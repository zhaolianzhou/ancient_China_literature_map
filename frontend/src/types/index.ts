export interface Location {
  name: string;
  ancient_name?: string;
  modern_name?: string;
  lat: number;
  lng: number;
  description?: string;
  poem_count?: number;
}

export interface Poem {
  id: number;
  title: string;
  author: string;
  dynasty: string;
  content: string;
  locations: string[];
  resolved_locations?: Location[];
  written_year?: number;
  occasion?: string;
}

export interface Poet {
  name: string;
  birth_year?: number;
  death_year?: number;
  native_place?: string;
  biography?: string;
  style?: string;
  poem_count?: number;
}

export interface PoetDetail extends Poet {
  poems: Poem[];
}

export interface TracePoint {
  sequence: number;
  poem_id: number;
  poem_title: string;
  year?: number;
  location: Location;
}

export interface PoetTrace {
  poet: string;
  birth_year?: number;
  death_year?: number;
  native_place?: string;
  biography?: string;
  style?: string;
  trace_count: number;
  trace: TracePoint[];
}

export interface HeatmapPoint {
  name: string;
  lat: number;
  lng: number;
  weight: number;
  modern: string;
}

export interface Stats {
  total_poems: number;
  total_poets: number;
  total_locations_db: number;
  total_unique_locations_in_poems: number;
  dynasties: string[];
  time_span: string;
}
