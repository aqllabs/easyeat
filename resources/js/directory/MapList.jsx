import React, { useState } from "react";
import {
    InstantSearch,
    useInstantSearch,
    useRefinementList,
    RefinementList,
    Hits,
    Configure,
    Pagination,
} from "react-instantsearch";
import { instantMeiliSearch } from "@meilisearch/instant-meilisearch";
import { CustomGeoSearch } from "./LeafletMap.jsx";
import { useSetAtom } from "jotai";
import { hoveredIdAtom, clickedIdAtom } from "@/Atoms";
import { createInfiniteHitsSessionStorageCache } from "instantsearch.js/es/lib/infiniteHitsCache";
const sessionStorageCache = createInfiniteHitsSessionStorageCache();

function MapList({ wire, ...props }) {
    const [showMap, setShowMap] = React.useState(false);
    const message = props.mingleData.message;

    const { searchClient } = instantMeiliSearch(
        "https://hi.aqllabs.io/",
        "Sf7kiWLUgoKF5Jnfai7B3OjAF1bgIcKx"
    );

    const setClickedId = useSetAtom(clickedIdAtom);
    const setHoveredId = useSetAtom(hoveredIdAtom);

    // Handle map toggle and reset
    const handleMapToggle = () => {
        if (showMap) {
            // Reset map-related states when switching back to list view
            setClickedId(null);
            setHoveredId(null);
        }
        setShowMap(!showMap);
    };

    if (!searchClient) {
        return <div>Loading...</div>;
    }

    return (
        <div className="flex h-screen flex-col overflow-hidden relative">
            <InstantSearch
                searchClient={searchClient}
                indexName="venues"
                future={{
                    preserveSharedStateOnUnmount: true,
                    persistHierarchicalRootCount: true,
                }}
            >
                <StickyHeader />
                <VirtualFilters />
                <div className="flex flex-col md:flex-row flex-1">
                    <div
                        className={`h-full md:h-[calc(100dvh-4rem)] md:w-1/3 w-full bg-base-200 overflow-y-auto relative 
                        ${showMap ? "hidden" : "block"} md:block`}
                    >
                        <NoResultsBoundary fallback={<NoResults />}>
                            <Hits
                                hitComponent={({ hit }) => (
                                    <Hit hit={hit} wire={wire} />
                                )}
                                classNames={{
                                    root: "flex flex-col justify-center",
                                    list: "p-4 grid grid-cols-1 gap-4",
                                    item: "",
                                }}
                            />
                            <Pagination
                                classNames={{
                                    root: "flex flex-row justify-center my-4",
                                    list: "flex flex-row",
                                    item: "mx-1",
                                    link: "btn btn-sm bg-base-100",
                                    selectedItem: "btn-primary",
                                    disabledItem: "hidden",
                                }}
                            />
                        </NoResultsBoundary>
                    </div>
                    <div
                        className={`h-full md:h-[calc(100dvh-4rem)] md:w-2/3 w-full relative z-[1]
                        ${showMap ? "block" : "hidden"} md:block`}
                    >
                        <CustomGeoSearch
                            key={showMap ? "map-visible" : "map-hidden"}
                        />
                    </div>
                </div>
                <button
                    onClick={handleMapToggle}
                    className="md:hidden fixed bottom-4 right-4 btn btn-primary btn-circle shadow-lg z-[2]"
                >
                    {showMap ? "📝" : "🗺️"}
                </button>
                <Configure hitsPerPage={20} />
            </InstantSearch>
        </div>
    );
}

export default MapList;

function StickyHeader() {
    const { items: cuisineItems } = useRefinementList({
        attribute: "cuisines",
    });
    const { items: dietItems } = useRefinementList({
        attribute: "diet_categories",
    });
    const { items: halalItems } = useRefinementList({
        attribute: "halal_assurance",
    });

    // Count selected items for each filter
    const selectedCuisines =
        cuisineItems?.filter((item) => item.isRefined).length || 0;
    const selectedDiets =
        dietItems?.filter((item) => item.isRefined).length || 0;
    const selectedHalal =
        halalItems?.filter((item) => item.isRefined).length || 0;

    const { refine, clear } = useRefinementList({ attribute: "cuisines" });
    const { refine: refineDiet, clear: clearDiet } = useRefinementList({
        attribute: "diet_categories",
    });
    const { refine: refineHalal, clear: clearHalal } = useRefinementList({
        attribute: "halal_assurance",
    });
    const setClickedId = useSetAtom(clickedIdAtom);
    const setHoveredId = useSetAtom(hoveredIdAtom);

    const handleResetAll = () => {
        clear();
        clearDiet();
        clearHalal();
        setClickedId(null);
        setHoveredId(null);
    };

    return (
        <div className="navbar sticky top-0 z-[50] border border-base-300">
            <div className="mr-4">
                {/* arrow left */}
                <a href="/" className="btn btn-ghost btn-sm ">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={2}
                        stroke="currentColor"
                        className="w-5 h-5 text-accent"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"
                        />
                    </svg>
                    <span className="text-xl font-bold text-accent">
                        EasyEat
                    </span>
                </a>
            </div>
            <div className="flex-1 flex items-center gap-2">
                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedCuisines > 0 ? "btn-primary" : ""
                        }`}
                    >
                        Cuisine{" "}
                        {selectedCuisines > 0 && (
                            <span className="badge badge-sm ml-2">
                                {selectedCuisines}
                            </span>
                        )}
                    </label>
                    <div
                        tabIndex={0}
                        className="dropdown-content z-[100] card card-compact w-64 p-2 shadow-lg bg-base-100 text-base-content mt-2 left-0 border border-base-300   "
                    >
                        <div className="card-body">
                            <h3 className="card-title">Select Cuisine</h3>
                            <RefinementList
                                sortBy={["count:desc"]}
                                operator="or"
                                attribute="cuisines"
                                classNames={{
                                    list: "w-full space-y-2",
                                    item: "flex items-center gap-2 hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full capitalize",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm ",
                                }}
                            />
                        </div>
                    </div>
                </div>
                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedDiets > 0 ? "btn-primary" : ""
                        }`}
                    >
                        Diet{" "}
                        {selectedDiets > 0 && (
                            <span className="badge badge-sm ml-2">
                                {selectedDiets}
                            </span>
                        )}
                    </label>
                    <div
                        tabIndex="0"
                        className="dropdown-content card card-compact w-64 p-2 shadow bg-base-100 text-base-content mt-2 left-0 border border-base-300   "
                    >
                        <div className="card-body overflow-y-scroll">
                            <h3 className="card-title">Select Diet</h3>
                            <RefinementList
                                sortBy={["count:desc"]}
                                operator="or"
                                attribute="diet_categories"
                                classNames={{
                                    list: "w-full space-y-2",
                                    item: "flex items-center gap-2 hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full capitalize",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm ",
                                }}
                            />
                        </div>
                    </div>
                </div>

                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedHalal > 0 ? "btn-primary" : ""
                        }`}
                    >
                        Halal Assurance{" "}
                        {selectedHalal > 0 && (
                            <span className="badge badge-sm ml-2">
                                {selectedHalal}
                            </span>
                        )}
                    </label>
                    <div className="dropdown-content card card-compact w-96 p-2 shadow bg-base-100 text-base-content mt-2 left-0 border border-base-300   ">
                        <div className="card-body">
                            <h3 className="card-title">
                                Select Halal Assurance
                            </h3>
                            <RefinementList
                                sortBy={["count:desc"]}
                                operator="or"
                                attribute="halal_assurance"
                                classNames={{
                                    list: "w-full space-y-2",
                                    item: "flex items-center gap-2 hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full capitalize",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm ",
                                }}
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div className="flex-none">
                <button
                    onClick={handleResetAll}
                    className="btn btn-ghost btn-sm"
                >
                    Reset Filters
                </button>
            </div>
        </div>
    );
}

function Hit({ hit, wire }) {
    const setHoveredId = useSetAtom(hoveredIdAtom);
    const setClickedId = useSetAtom(clickedIdAtom);

    return (
        <div
            className="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow"
            onMouseEnter={() => setHoveredId(hit.id)}
            onMouseLeave={() => setHoveredId(null)}
            onClick={() => setClickedId(hit.id)}
        >
            {/* Keep original image styling */}
            {hit.thumbnail_url && (
                <figure className="h-48 w-full">
                    <img
                        src={
                            "https://www.discoverhongkong.com/" +
                            hit.thumbnail_url
                        }
                        alt={hit.name}
                        className="w-full h-full object-cover"
                    />
                </figure>
            )}

            {/* Updated content section */}
            <div className="card-body p-4">
                <div className="flex justify-between items-start">
                    <a
                        className="link link-accent no-underline "
                        onClick={(e) => {
                            e.stopPropagation();
                            Livewire.navigate(`/places/${hit.id}`);
                        }}
                    >
                        <h2 className="card-title">{hit.name}</h2>
                    </a>
                </div>

                <div className="flex flex-wrap gap-2">
                    {hit.halal_assurance && (
                        <div className="badge badge-success badge-outline">
                            {hit.halal_assurance}
                        </div>
                    )}
                    {hit.diet_categories?.map((category, index) => (
                        <div key={index} className="badge badge-accent">
                            {category}
                        </div>
                    ))}
                    {hit.cuisines?.map((cuisine, index) => (
                        <div
                            key={index}
                            className="badge badge-accent badge-outline"
                        >
                            {cuisine}
                        </div>
                    ))}
                    {hit.price_range && (
                        <div className="badge badge-secondary badge-outline">
                            {hit.price_range}
                        </div>
                    )}
                </div>

                {hit.address && (
                    <div className="text-base-content/70 flex items-start gap-2">
                        <svg
                            className="w-5 h-5 mt-0.5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth={2}
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                            />
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth={2}
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                        <p className="flex-1">{hit.address}</p>
                    </div>
                )}
            </div>
        </div>
    );
}

function VirtualFilters() {
    useRefinementList({
        attribute: "area",
        operator: "or",
    });
    useRefinementList({
        attribute: "cuisines",
        operator: "or",
    });
    return null;
}

function NoResultsBoundary({ children, fallback }) {
    const { results } = useInstantSearch();

    // The `__isArtificial` flag makes sure not to display the No Results message
    // when no hits have been returned.
    if (!results.__isArtificial && results.nbHits === 0) {
        return (
            <>
                {fallback}
                <div hidden>{children}</div>
            </>
        );
    }

    return children;
}

function NoResults() {
    return (
        <div>
            <p>No results for.</p>
        </div>
    );
}
