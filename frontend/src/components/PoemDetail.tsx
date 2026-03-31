import { useQuery } from '@tanstack/react-query';
import { fetchPoem, fetchPoemsAtLocation } from '../api/client';
import type { TracePoint } from '../types';

interface PoemDetailProps {
  selectedPoint: { pt: TracePoint; poet: string } | null;
  selectedLocation: string | null;
  onClose: () => void;
}

export function PoemDetail({ selectedPoint, selectedLocation, onClose }: PoemDetailProps) {
  const { data: poem } = useQuery({
    queryKey: ['poem', selectedPoint?.pt.poem_id],
    queryFn: () => fetchPoem(selectedPoint!.pt.poem_id),
    enabled: !!selectedPoint,
  });

  const { data: locationData } = useQuery({
    queryKey: ['location-poems', selectedLocation],
    queryFn: () => fetchPoemsAtLocation(selectedLocation!),
    enabled: !!selectedLocation && !selectedPoint,
  });

  if (!selectedPoint && !selectedLocation) return null;

  const containerStyle: React.CSSProperties = {
    position: 'absolute',
    bottom: 20,
    right: 20,
    width: 320,
    maxHeight: '60vh',
    background: '#fffdf7',
    borderRadius: 10,
    boxShadow: '0 4px 24px rgba(0,0,0,0.18)',
    overflowY: 'auto',
    zIndex: 1000,
    fontFamily: 'serif',
  };

  const headerStyle: React.CSSProperties = {
    padding: '12px 16px',
    background: '#f5ede0',
    borderRadius: '10px 10px 0 0',
    display: 'flex',
    justifyContent: 'space-between',
    alignItems: 'flex-start',
    gap: 8,
  };

  const bodyStyle: React.CSSProperties = {
    padding: '12px 16px',
  };

  if (selectedPoint && poem) {
    return (
      <div style={containerStyle}>
        <div style={headerStyle}>
          <div>
            <div style={{ fontSize: 16, fontWeight: 700 }}>《{poem.title}》</div>
            <div style={{ fontSize: 12, color: '#888', marginTop: 2 }}>
              {poem.author} · {poem.dynasty}代
              {poem.written_year ? ` · ${poem.written_year} AD` : ''}
            </div>
          </div>
          <button
            onClick={onClose}
            style={{
              background: 'none',
              border: 'none',
              cursor: 'pointer',
              fontSize: 18,
              color: '#999',
              padding: 0,
              lineHeight: 1,
            }}
          >
            ×
          </button>
        </div>
        <div style={bodyStyle}>
          {/* Poem content */}
          <pre
            style={{
              fontSize: 15,
              lineHeight: 2,
              whiteSpace: 'pre-wrap',
              margin: 0,
              color: '#2c2c2c',
              letterSpacing: '0.05em',
            }}
          >
            {poem.content}
          </pre>

          {poem.occasion && (
            <p
              style={{
                fontSize: 11,
                color: '#888',
                fontStyle: 'italic',
                marginTop: 10,
                borderTop: '1px solid #eee',
                paddingTop: 8,
              }}
            >
              {poem.occasion}
            </p>
          )}

          {/* Locations in this poem */}
          {poem.resolved_locations && poem.resolved_locations.length > 0 && (
            <div style={{ marginTop: 10, borderTop: '1px solid #eee', paddingTop: 8 }}>
              <div style={{ fontSize: 11, color: '#888', marginBottom: 4 }}>涉及地点：</div>
              <div style={{ display: 'flex', flexWrap: 'wrap', gap: 4 }}>
                {poem.resolved_locations.map((loc) => (
                  <span
                    key={loc.name}
                    style={{
                      background: '#e8f0fe',
                      borderRadius: 10,
                      padding: '2px 8px',
                      fontSize: 11,
                      color: '#3367d6',
                    }}
                  >
                    {loc.name}
                  </span>
                ))}
              </div>
            </div>
          )}
        </div>
      </div>
    );
  }

  if (selectedLocation && locationData) {
    return (
      <div style={containerStyle}>
        <div style={headerStyle}>
          <div>
            <div style={{ fontSize: 16, fontWeight: 700 }}>{selectedLocation}</div>
            {locationData.location.modern_name && (
              <div style={{ fontSize: 11, color: '#888' }}>
                今：{locationData.location.modern_name}
              </div>
            )}
            {locationData.location.description && (
              <div style={{ fontSize: 11, color: '#666' }}>
                {locationData.location.description}
              </div>
            )}
          </div>
          <button
            onClick={onClose}
            style={{
              background: 'none',
              border: 'none',
              cursor: 'pointer',
              fontSize: 18,
              color: '#999',
              padding: 0,
              lineHeight: 1,
            }}
          >
            ×
          </button>
        </div>
        <div style={bodyStyle}>
          <div style={{ fontSize: 12, color: '#888', marginBottom: 8 }}>
            共 {locationData.poem_count} 首诗提及此地：
          </div>
          {locationData.poems.map((p) => (
            <div
              key={p.id}
              style={{
                borderBottom: '1px solid #f0ebe0',
                paddingBottom: 8,
                marginBottom: 8,
              }}
            >
              <div style={{ fontWeight: 600, fontSize: 13 }}>《{p.title}》</div>
              <div style={{ fontSize: 11, color: '#888' }}>
                {p.author}{p.written_year ? ` · ${p.written_year} AD` : ''}
              </div>
              <pre
                style={{
                  fontSize: 12,
                  lineHeight: 1.8,
                  whiteSpace: 'pre-wrap',
                  margin: '4px 0 0',
                  color: '#444',
                }}
              >
                {p.content}
              </pre>
            </div>
          ))}
        </div>
      </div>
    );
  }

  return null;
}
