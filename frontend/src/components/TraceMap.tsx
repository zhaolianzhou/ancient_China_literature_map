import { useEffect, useRef } from 'react';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import type { TracePoint, HeatmapPoint } from '../types';

// Fix Leaflet default icon paths broken by Vite bundling
import iconUrl from 'leaflet/dist/images/marker-icon.png';
import iconRetinaUrl from 'leaflet/dist/images/marker-icon-2x.png';
import shadowUrl from 'leaflet/dist/images/marker-shadow.png';

delete (L.Icon.Default.prototype as unknown as Record<string, unknown>)._getIconUrl;
L.Icon.Default.mergeOptions({ iconUrl, iconRetinaUrl, shadowUrl });

// Colour palette for poets
const POET_COLORS = [
  '#e74c3c', '#3498db', '#2ecc71', '#f39c12', '#9b59b6',
  '#1abc9c', '#e67e22', '#e91e63', '#00bcd4', '#8bc34a',
];

interface TraceMapProps {
  traces: { poet: string; trace: TracePoint[]; color: string }[];
  heatmap?: HeatmapPoint[];
  onLocationClick?: (name: string) => void;
  onTracePointClick?: (pt: TracePoint, poet: string) => void;
  showHeatmap?: boolean;
}

export function TraceMap({
  traces,
  heatmap,
  onLocationClick,
  onTracePointClick,
  showHeatmap = false,
}: TraceMapProps) {
  const mapRef = useRef<HTMLDivElement>(null);
  const leafletMap = useRef<L.Map | null>(null);
  const layersRef = useRef<L.Layer[]>([]);

  // Initialise map once
  useEffect(() => {
    if (!mapRef.current || leafletMap.current) return;

    const map = L.map(mapRef.current, {
      center: [35.0, 105.0],
      zoom: 5,
      minZoom: 3,
      maxZoom: 12,
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors',
      maxZoom: 19,
    }).addTo(map);

    leafletMap.current = map;

    return () => {
      map.remove();
      leafletMap.current = null;
    };
  }, []);

  // Redraw traces when data changes
  useEffect(() => {
    const map = leafletMap.current;
    if (!map) return;

    // Clear old layers
    layersRef.current.forEach((l) => map.removeLayer(l));
    layersRef.current = [];

    if (showHeatmap && heatmap && heatmap.length > 0) {
      // Draw circles sized by poem count
      const maxWeight = Math.max(...heatmap.map((h) => h.weight));
      heatmap.forEach((point) => {
        const radius = 8 + (point.weight / maxWeight) * 30;
        const circle = L.circleMarker([point.lat, point.lng], {
          radius,
          fillColor: '#f39c12',
          color: '#e67e22',
          weight: 1,
          opacity: 0.8,
          fillOpacity: 0.5,
        })
          .bindPopup(
            `<div style="min-width:160px">
              <b>${point.name}</b><br/>
              <span style="color:#666">${point.modern}</span><br/>
              <b>${point.weight}</b> poem${point.weight > 1 ? 's' : ''}
            </div>`
          )
          .addTo(map);
        circle.on('click', () => onLocationClick?.(point.name));
        layersRef.current.push(circle);
      });
      return;
    }

    // Draw each poet's travel trace
    traces.forEach(({ poet, trace, color }) => {
      if (trace.length === 0) return;

      const latlngs: L.LatLngExpression[] = trace.map((pt) => [
        pt.location.lat,
        pt.location.lng,
      ]);

      // Polyline connecting the trace
      const line = L.polyline(latlngs, {
        color,
        weight: 2.5,
        opacity: 0.7,
        dashArray: '6 4',
      }).addTo(map);
      layersRef.current.push(line);

      // Numbered markers
      trace.forEach((pt, idx) => {
        const markerIcon = L.divIcon({
          className: '',
          html: `<div style="
            background:${color};
            color:#fff;
            border-radius:50%;
            width:22px;height:22px;
            display:flex;align-items:center;justify-content:center;
            font-size:10px;font-weight:bold;
            border:2px solid #fff;
            box-shadow:0 1px 3px rgba(0,0,0,0.4);
          ">${idx + 1}</div>`,
          iconSize: [22, 22],
          iconAnchor: [11, 11],
        });

        const popupContent = `
          <div style="min-width:180px;font-family:serif">
            <div style="font-size:13px;font-weight:bold;color:${color}">${poet}</div>
            <div style="font-size:12px;color:#333;margin-top:2px">${pt.location.name}</div>
            ${pt.location.ancient_name && pt.location.ancient_name !== pt.location.name
              ? `<div style="font-size:11px;color:#888">古称：${pt.location.ancient_name}</div>`
              : ''}
            ${pt.location.modern_name
              ? `<div style="font-size:11px;color:#888">今：${pt.location.modern_name}</div>`
              : ''}
            <hr style="margin:6px 0;border:none;border-top:1px solid #eee"/>
            <div style="font-size:12px;font-weight:bold">《${pt.poem_title}》</div>
            ${pt.year ? `<div style="font-size:11px;color:#888">${pt.year} AD</div>` : ''}
            ${pt.location.description
              ? `<div style="font-size:11px;color:#555;margin-top:4px">${pt.location.description}</div>`
              : ''}
          </div>`;

        const marker = L.marker([pt.location.lat, pt.location.lng], {
          icon: markerIcon,
        })
          .bindPopup(popupContent)
          .addTo(map);

        marker.on('click', () => onTracePointClick?.(pt, poet));
        layersRef.current.push(marker);
      });
    });
  }, [traces, heatmap, showHeatmap, onLocationClick, onTracePointClick]);

  return (
    <div
      ref={mapRef}
      style={{ width: '100%', height: '100%', borderRadius: '8px' }}
    />
  );
}

export { POET_COLORS };
