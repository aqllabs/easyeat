import { useGeoSearch } from "react-instantsearch";
import {
    MapContainer,
    TileLayer,
    Marker,
    Popup,
    useMapEvents,
    useMap,
} from "react-leaflet";
import L from "leaflet";
import { hoveredIdAtom, clickedIdAtom } from "@/Atoms";
import { useAtomValue, useSetAtom } from "jotai";
import { useEffect, useState } from "react";

export function CustomGeoSearch() {
    // Hong Kong coordinates
    const hongKongCenter = [22.3193, 114.1694];
    const hongKongBounds = [
        [22.1193, 113.897], // Southwest corner
        [22.5193, 114.4413], // Northeast corner
    ];

    return (
        <div style={{ height: "100%", width: "100%" }}>
            <MapContainer
                zoom={12}
                minZoom={12}
                scrollWheelZoom={true}
                center={hongKongCenter}
                bounds={hongKongBounds}
                maxBounds={hongKongBounds}
                style={{ height: "100%", width: "100%" }}
            >
                <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
                <Restaurants />
            </MapContainer>
        </div>
    );
}

function Restaurants() {
    const { items, refine: refineItems, currentRefinement } = useGeoSearch();
    const hoveredItemId = useAtomValue(hoveredIdAtom);
    const clickedItemId = useAtomValue(clickedIdAtom);
    const setClickedId = useSetAtom(clickedIdAtom);

    const map = useMap();

    const [mapBounds, setMapBounds] = useState(null);

    const onViewChange = ({ target }) => {
        const newBounds = {
            northEast: target.getBounds().getNorthEast(),
            southWest: target.getBounds().getSouthWest(),
        };
        setMapBounds(newBounds);
    };

    useMapEvents({
        dragend: onViewChange,
    });

    const handleRedoSearch = () => {
        if (mapBounds) {
            const updatedRefinement = {
                ...currentRefinement,
                ...mapBounds,
            };
            refineItems(updatedRefinement);
        }
    };

    const markerIcon = L.icon({
        iconUrl: "images/marker-icon.png",
        shadowUrl: "images/marker-shadow.png",
        iconSize: [20, 30], // size of the icon
        shadowSize: [41, 41], // size of the shadow
        iconAnchor: [12, 41], // point of the icon which will correspond to marker's location
        shadowAnchor: [12, 41], // the same for the shadow
        popupAnchor: [1, -34], // point from which the popup should open relative to the iconAnchor
    });

    const customIcon = new L.Icon({
        iconUrl: "images/marker-icon-2x-red.png",
        shadowUrl: "images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    });

    useEffect(() => {
        const clickedItem = items.find((item) => item.id === clickedItemId);
        if (clickedItem) {
            map.setView(clickedItem._geoloc, 15, { animate: true });
            setClickedId(null);
        }
    }, [clickedItemId, items, map]);

    return (
        <>
            <button
                onClick={handleRedoSearch}
                className="absolute top-2.5  left-16 z-50 px-2.5 py-1.5 bg-white border-2 border-gray-300 rounded cursor-pointer"
                style={{
                    zIndex: 1000,
                }}
            >
                Redo Search
            </button>
            {items.map((item) => (
                <Marker
                    key={item.objectID}
                    position={item._geoloc}
                    zIndexOffset={item.id === hoveredItemId ? 25 : 1}
                    riseOffset={item.id === hoveredItemId ? 25 : 0}
                    icon={item.id === hoveredItemId ? customIcon : markerIcon}
                >
                    <Popup>
                        <strong>{item.name}</strong>
                        <br />
                        {item.area}, {item.cousine}
                    </Popup>
                </Marker>
            ))}
        </>
    );
}
