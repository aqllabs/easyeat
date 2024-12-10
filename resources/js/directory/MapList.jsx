import React, { useState } from "react";
import {
    InstantSearch,
    useInstantSearch,
    useRefinementList,
    RefinementList,
    Hits,
    Configure,
    Pagination,
    useClearRefinements,
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

    // Add new state for drawer
    const [showFilters, setShowFilters] = useState(false);

    // Handle map toggle and reset
    const handleMapToggle = () => {
        if (showMap) {
            // Reset map-related states when switching back to list view
            setClickedId(null);
            setHoveredId(null);
        }
        setShowMap(!showMap);
    };

    // Add logging to track drawer state changes
    React.useEffect(() => {
        console.log("Drawer state changed:", showFilters);
    }, [showFilters]);

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
                <StickyHeader onFilterClick={() => setShowFilters(true)} />
                <VirtualFilters />
                <div className="flex flex-col md:flex-row flex-1">
                    <div
                        className={`h-full md:h-[calc(100dvh-4rem)] md:w-1/3 w-full bg-base-100 overflow-y-auto relative
                        hidden md:block`}
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
                        block`}
                    >
                        <CustomGeoSearch
                            key={showMap ? "map-visible" : "map-hidden"}
                        />
                    </div>
                </div>
            </InstantSearch>
        </div>
    );
}

export default MapList;

function StickyHeader({ onFilterClick }) {
    const { items: cuisineItems, refine: refineCuisine } = useRefinementList({
        attribute: "cuisines",
        operator: "or",
        showMore: true,
    });
    const { items: dietItems, refine: refineDiet } = useRefinementList({
        attribute: "diet_categories",
        operator: "or",
    });
    const { items: halalItems, refine: refineHalal } = useRefinementList({
        attribute: "halal_assurance",
        operator: "or",
    });
    const { items: vegetarianItems, refine: refineVegetarian } =
        useRefinementList({
            attribute: "vegetarian_type",
            operator: "or",
        });

    // Add this hook
    const { refine: clearAllRefinements } = useClearRefinements();

    // Count selected items for each filter
    const selectedCuisines =
        cuisineItems?.filter((item) => item.isRefined).length || 0;
    const selectedDiets =
        dietItems?.filter((item) => item.isRefined).length || 0;
    const selectedHalal =
        halalItems?.filter((item) => item.isRefined).length || 0;
    const selectedVegetarian =
        vegetarianItems?.filter((item) => item.isRefined).length || 0;

    const setClickedId = useSetAtom(clickedIdAtom);
    const setHoveredId = useSetAtom(hoveredIdAtom);

    const handleResetAll = () => {
        clearAllRefinements();
        setClickedId(null);
        setHoveredId(null);
    };

    // Calculate total selected filters
    const totalSelectedFilters =
        selectedCuisines + selectedDiets + selectedHalal + selectedVegetarian;

    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <div className="navbar sticky top-0 z-[50] border border-base-300">
            <div className="px-2">
                <a
                    href="/"
                    className="flex flex-row items-center justify-center font-bold text-md"
                >
                    <img
                        className=" w-24 h-12 object-fill"
                        src="/images/easyeat2.png"
                        alt=""
                    />
                </a>
            </div>
            <div className="flex-1 items-center gap-2 hidden md:flex">
                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedCuisines > 0 ? "btn-secondary" : ""
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
                                showMore={true}
                                classNames={{
                                    list: "w-full space-y-2 overflow-y-auto h-64",
                                    item: "hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm ",
                                    showMore: "btn btn-sm btn-primary",
                                }}
                            />
                        </div>
                    </div>
                </div>
                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedDiets > 0 ? "btn-secondary" : ""
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
                                    item: "hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full p-2",
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
                            selectedHalal > 0 ? "btn-secondary" : ""
                        }`}
                    >
                        Halal Assurance{" "}
                        {selectedHalal > 0 && (
                            <span className="badge badge-sm ml-2">
                                {selectedHalal}
                            </span>
                        )}
                    </label>
                    <div
                        tabIndex="0"
                        className="dropdown-content card card-compact w-96 p-2 shadow bg-base-100 text-base-content mt-2 left-0 border border-base-300   "
                    >
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
                                    item: "hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm ",
                                }}
                            />
                        </div>
                    </div>
                </div>

                {/* Vegetarian Type Filter */}
                <div className="dropdown dropdown-end">
                    <label
                        tabIndex={0}
                        className={`btn btn-outline btn-sm m-1 ${
                            selectedVegetarian > 0 ? "btn-secondary" : ""
                        }`}
                    >
                        Vegetarian Type{" "}
                        {selectedVegetarian > 0 && (
                            <span className="badge badge-sm ml-2">
                                {selectedVegetarian}
                            </span>
                        )}
                    </label>
                    <div
                        tabIndex={0}
                        className="dropdown-content z-[100] card card-compact w-64 p-2 shadow-lg bg-base-100 text-base-content mt-2 left-0 border border-base-300"
                    >
                        <div className="card-body">
                            <h3 className="card-title">
                                Select Vegetarian Type
                            </h3>
                            <RefinementList
                                sortBy={["count:desc"]}
                                operator="or"
                                attribute="vegetarian_type"
                                classNames={{
                                    list: "w-full space-y-2 overflow-y-auto max-h-64",
                                    item: "hover:bg-base-200 rounded-sm",
                                    label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                    count: "badge badge-sm ml-auto",
                                    checkbox: "checkbox checkbox-sm",
                                    showMore: "btn btn-sm btn-primary",
                                }}
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div className="flex-1 md:hidden">
                <button
                    onClick={() => setIsModalOpen(true)}
                    className={`btn btn-sm ${
                        totalSelectedFilters > 0 ? "btn-primary" : "btn-ghost"
                    }`}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="size-6"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"
                        />
                    </svg>
                    {totalSelectedFilters > 0 && (
                        <span className="badge badge-sm">
                            {totalSelectedFilters}
                        </span>
                    )}
                </button>

                {/* Modal */}
                <dialog
                    className="modal modal-bottom md:modal-middle"
                    open={isModalOpen}
                    onClick={(e) => {
                        if (e.target.closest(".modal-box")) return;
                        setIsModalOpen(false);
                    }}
                >
                    <div className="modal-box">
                        <div className="flex justify-between items-center mb-4">
                            <h3 className="font-bold text-lg">Filters</h3>
                            <button
                                className="btn btn-sm btn-circle btn-ghost"
                                onClick={() => setIsModalOpen(false)}
                            >
                                ✕
                            </button>
                        </div>
                        <div className="space-y-6 max-h-[70vh] overflow-y-auto">
                            {/* Cuisine Filter */}
                            <div className="card bg-base-200">
                                <div className="card-body p-4">
                                    <h3 className="card-title text-base">
                                        Cuisine
                                        {selectedCuisines > 0 && (
                                            <span className="badge badge-primary badge-sm">
                                                {selectedCuisines}
                                            </span>
                                        )}
                                    </h3>
                                    <RefinementList
                                        operator="or"
                                        showMore={true}
                                        limit={5}
                                        attribute="cuisines"
                                        classNames={{
                                            list: "w-full space-y-2",
                                            item: "hover:bg-base-300 rounded-sm",
                                            label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                            count: "badge badge-sm ml-auto",
                                            checkbox: "checkbox checkbox-sm",
                                        }}
                                    />
                                </div>
                            </div>

                            {/* Diet Filter */}
                            <div className="card bg-base-200">
                                <div className="card-body p-4">
                                    <h3 className="card-title text-base">
                                        Diet
                                        {selectedDiets > 0 && (
                                            <span className="badge badge-primary badge-sm">
                                                {selectedDiets}
                                            </span>
                                        )}
                                    </h3>
                                    <RefinementList
                                        sortBy={["count:desc"]}
                                        operator="or"
                                        attribute="diet_categories"
                                        classNames={{
                                            list: "w-full space-y-2",
                                            item: "hover:bg-base-300 rounded-sm",
                                            label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                            count: "badge badge-sm ml-auto",
                                            checkbox: "checkbox checkbox-sm",
                                        }}
                                    />
                                </div>
                            </div>

                            {/* Halal Assurance Filter */}
                            <div className="card bg-base-200">
                                <div className="card-body p-4">
                                    <h3 className="card-title text-base">
                                        Halal Assurance
                                        {selectedHalal > 0 && (
                                            <span className="badge badge-primary badge-sm">
                                                {selectedHalal}
                                            </span>
                                        )}
                                    </h3>
                                    <RefinementList
                                        sortBy={["count:desc"]}
                                        operator="or"
                                        attribute="halal_assurance"
                                        classNames={{
                                            list: "w-full space-y-2",
                                            item: "hover:bg-base-300 rounded-sm",
                                            label: "label cursor-pointer flex items-center gap-2 w-full p-2",
                                            count: "badge badge-sm ml-auto",
                                            checkbox: "checkbox checkbox-sm",
                                        }}
                                    />
                                </div>
                            </div>
                        </div>
                        <div className="modal-action">
                            <button
                                className="btn btn-ghost btn-sm"
                                onClick={handleResetAll}
                            >
                                Reset Filters
                            </button>
                            <button
                                className="btn btn-primary btn-sm"
                                onClick={() => setIsModalOpen(false)}
                            >
                                Done
                            </button>
                        </div>
                    </div>
                </dialog>
            </div>
            <div className="flex-none hidden md:block">
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
                            "https://easyeat.s3.ap-southeast-1.amazonaws.com/" +
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
                        className="link link-secondary no-underline "
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
                        <div className="badge badge-primary badge-outline">
                            {hit.halal_assurance}
                        </div>
                    )}
                    {hit.diet_categories?.map((category, index) => (
                        <div key={index} className="badge badge-secondary">
                            {category}
                        </div>
                    ))}
                    {hit.cuisines?.map((cuisine, index) => (
                        <div
                            key={index}
                            className="badge badge-secondary badge-outline"
                        >
                            {cuisine}
                        </div>
                    ))}
                    {hit.price_range && (
                        <div className="badge badge-accent badge-outline">
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
        attribute: "cuisines",
        operator: "or",
        showMore: true,
    });
    useRefinementList({
        attribute: "diet_categories",
        operator: "or",
    });
    useRefinementList({
        attribute: "halal_assurance",
        operator: "or",
    });
    useRefinementList({
        attribute: "vegetarian_type",
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
