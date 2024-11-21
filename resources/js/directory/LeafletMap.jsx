import { useGeoSearch } from "react-instantsearch";
import {
    MapContainer,
    TileLayer,
    Marker,
    Popup,
    useMapEvents,
    useMap,
    Rectangle,
} from "react-leaflet";
import L from "leaflet";
import { hoveredIdAtom, clickedIdAtom } from "@/Atoms";
import { useAtomValue, useSetAtom } from "jotai";
import { useEffect, useState, useRef } from "react";

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
    const [selectedItem, setSelectedItem] = useState(null);
    const markerRefs = useRef({});
    const [searchBounds, setSearchBounds] = useState(null);

    const onViewChange = ({ target }) => {
        const bounds = target.getBounds();
        const boundsSize = bounds
            .getNorthEast()
            .distanceTo(bounds.getSouthWest());

        // Don't update if the view is too large or too small
        if (boundsSize > 50000 || boundsSize < 100) {
            return;
        }

        const newBounds = {
            northEast: target.getBounds().getNorthEast(),
            southWest: target.getBounds().getSouthWest(),
        };
        setMapBounds(newBounds);

        // Update the visual rectangle bounds
        setSearchBounds([
            [newBounds.southWest.lat, newBounds.southWest.lng],
            [newBounds.northEast.lat, newBounds.northEast.lng],
        ]);
    };

    const handleRedoSearch = () => {
        if (mapBounds) {
            refineItems({
                ...currentRefinement,
                ...mapBounds,
            });
        }
    };

    const closePopup = () => {
        console.log("closePopup called");
        // Close all marker popups
        Object.values(markerRefs.current).forEach((marker) => {
            if (marker && marker.isPopupOpen()) {
                marker.closePopup();
                console.log("Popup closed for marker");
            }
        });
        setSelectedItem(null);
    };

    useMapEvents({
        moveend: (e) => {
            onViewChange(e);
        },
    });

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
            // Wait for animation to complete before clearing clickedId
            setTimeout(() => {
                setClickedId(null);
            }, 1000); // 1 second delay to match default Leaflet animation duration
            setSelectedItem(clickedItem);

            // Open the popup for the clicked item
            const marker = markerRefs.current[clickedItem.objectID];
            if (marker) {
                marker.openPopup();
            }
        }
    }, [clickedItemId, items, map, setClickedId]);

    return (
        <>
            {/* Add Redo Search Button */}
            <div className="absolute top-4 right-4 z-[1000]">
                <button
                    onClick={handleRedoSearch}
                    className="bg-primary text-black font-bold px-4 py-2 rounded-lg shadow-lg hover:bg-primary/80 transition-colors"
                >
                    Redo Search in This Area
                </button>
            </div>

            {items.map((item) => (
                <Marker
                    key={item.objectID}
                    position={item._geoloc}
                    zIndexOffset={item.id === hoveredItemId ? 25 : 1}
                    riseOffset={item.id === hoveredItemId ? 25 : 0}
                    icon={item.id === hoveredItemId ? customIcon : markerIcon}
                    ref={(ref) => {
                        if (ref) {
                            markerRefs.current[item.objectID] = ref;
                        }
                    }}
                >
                    <Popup onClose={closePopup}>
                        <div>
                            <div className="flex justify-between items-start mb-2">
                                <h3 className="font-bold text-lg">
                                    {item.name}
                                </h3>
                            </div>
                            <div className="text-sm">
                                <ul className="space-y-1">
                                    <li>
                                        <span className="font-semibold">
                                            Diet:
                                        </span>{" "}
                                        {item.diet_categories.join(", ")}
                                    </li>
                                    <li>
                                        <span className="font-semibold">
                                            Cuisine:
                                        </span>{" "}
                                        {item.cuisines.join(", ")}
                                    </li>
                                    <li>
                                        <span className="font-semibold">
                                            Area:
                                        </span>{" "}
                                        {item.area}
                                    </li>
                                    {item.address && (
                                        <li>
                                            <span className="font-semibold">
                                                Address:
                                            </span>{" "}
                                            {item.address}
                                        </li>
                                    )}
                                    {item.phone && (
                                        <li>
                                            <span className="font-semibold">
                                                Phone:
                                            </span>{" "}
                                            <a
                                                href={`tel:${item.phone}`}
                                                className="text-blue-600 hover:underline"
                                            >
                                                {item.phone}
                                            </a>
                                        </li>
                                    )}

                                    {item.openingHours && (
                                        <li>
                                            <span className="font-semibold">
                                                Hours:
                                            </span>{" "}
                                            {item.openingHours}
                                        </li>
                                    )}

                                    {item.price_range && (
                                        <li>
                                            <span className="font-semibold">
                                                Price Range:
                                            </span>{" "}
                                            {item.price_range}
                                        </li>
                                    )}
                                    {item.google_maps_url && (
                                        <li>
                                            <a
                                                href={item.google_maps_url}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="btn btn-sm btn-primary"
                                            >
                                                Get Directions
                                            </a>
                                        </li>
                                    )}
                                </ul>
                            </div>
                        </div>
                    </Popup>
                </Marker>
            ))}
        </>
    );
}
