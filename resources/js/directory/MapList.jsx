import React from "react";
import {
    InstantSearch,
    useInstantSearch,
    useRefinementList,
} from "react-instantsearch";
import { instantMeiliSearch } from "@meilisearch/instant-meilisearch";
import {
    RefinementList,
    Hits,
    Configure,
    Pagination,
} from "react-instantsearch";
import { CustomGeoSearch } from "./LeafletMap.jsx";
import { useSetAtom } from "jotai";
import { hoveredIdAtom, clickedIdAtom } from "@/Atoms";
import { createInfiniteHitsSessionStorageCache } from "instantsearch.js/es/lib/infiniteHitsCache";
const sessionStorageCache = createInfiniteHitsSessionStorageCache();

function MapList({ wire, ...props }) {
    const message = props.mingleData.message;

    console.log(message); // 'Message in a bottle 🍾'

    wire.doubleIt(2).then((data) => {
        console.log(data); // 4
    });

    const { searchClient } = instantMeiliSearch(
        "https://hi.aqllabs.io/",
        "Sf7kiWLUgoKF5Jnfai7B3OjAF1bgIcKx"
    );

    if (!searchClient) {
        return <div>Loading...</div>;
    }

    return (
        <div className="container mx-auto flex h-screen max-w-screen-2xl flex-col overflow-hidden">
            <InstantSearch
                searchClient={searchClient}
                indexName="restaurants"
                future={{
                    preserveSharedStateOnUnmount: true,
                    persistHierarchicalRootCount: true,
                }}
            >
                <StickyHeader />
                <VirtualFilters />
                <div className="flex flex-col md:flex-row">
                    <div className="max-h-[calc(100dvh-4rem)] min-h-[calc(100dvh-4rem)] bg-base-200 sm:hidden md:block w-full overflow-y-auto md:w-1/2">
                        <NoResultsBoundary fallback={<NoResults />}>
                            <Hits
                                hitComponent={Hit}
                                classNames={{
                                    root: "flex flex-col justify-center",
                                    list: "p-4",
                                    item: "mt-2",
                                }}
                            />
                            <Pagination
                                classNames={{
                                    root: "flex flex-row justify-center my-4",
                                    list: "flex flex-row",
                                    item: "mx-1",
                                    link: "btn btn-sm",
                                    selectedItem: "btn-primary",
                                }}
                            />
                        </NoResultsBoundary>
                    </div>
                    <div className="h-[calc(100vh-4rem)] w-full md:w-1/2">
                        <CustomGeoSearch />
                    </div>
                </div>
                <Configure hitsPerPage={20} />
            </InstantSearch>
        </div>
    );
}

export default MapList;

function StickyHeader() {
    useInstantSearch();

    return (
        <div className="navbar sticky top-0 z-50 border rounded mt-1 border-base-300">
            <div className="">
                <a className="btn btn-ghost text-xl">Restaurants</a>
            </div>
            <div className="">
                <div className="dropdown dropdown-end">
                    <label tabIndex="0" className="btn btn-ghost m-1">
                        Cuisine
                    </label>
                    <div
                        tabIndex="0"
                        className="dropdown-content z-[1] card card-compact w-64 p-2 shadow bg-base-100 text-base-content"
                    >
                        <div className="card-body">
                            <h3 className="card-title">Select Cuisine</h3>
                            <RefinementList
                                operator="or"
                                attribute="cousine"
                                classNames={{
                                    list: " w-56",
                                    item: "",
                                    label: "label-text",
                                    count: "badge badge-sm",
                                    checkbox: "checkbox-primary",
                                }}
                            />
                        </div>
                    </div>
                </div>
                <div className="dropdown dropdown-end">
                    <label tabIndex="0" className="btn btn-ghost m-1">
                        Area
                    </label>
                    <div
                        tabIndex="0"
                        className="dropdown-content z-[1] card card-compact w-64 p-2 shadow bg-base-100 text-base-content"
                    >
                        <div className="card-body">
                            <h3 className="card-title">Select Area</h3>
                            <RefinementList
                                operator="or"
                                attribute="area"
                                classNames={{
                                    list: " w-56",
                                    item: "",
                                    label: "label-text",
                                    count: "badge badge-sm",
                                    checkbox: "checkbox-primary",
                                }}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

function Hit({ hit }) {
    const setHoveredId = useSetAtom(hoveredIdAtom);
    const setClickedId = useSetAtom(clickedIdAtom);
    const handleMouseEnter = () => {
        setHoveredId(hit.id);
    };

    const handleMouseLeave = () => {
        setHoveredId(null);
    };

    const handleClick = () => {
        setClickedId(hit.id);
    };

    return (
        <div
            className="card bg-base-100 shadow-xl"
            onMouseEnter={handleMouseEnter}
            onMouseLeave={handleMouseLeave}
            onClick={handleClick}
        >
            <div className="card-body">
                <h2 className="card-title">{hit.cuisine}</h2>
                <p>{hit.name}</p>
                <p className="text-base-content/70">{hit.address}</p>
                <p className="text-base-content/70">{hit.area}</p>
                <p className="text-base-content/70">{hit.cousine}</p>
                <div className="card-actions justify-end">
                    <div className="badge badge-outline">{hit.area}</div>
                    <div className="badge badge-primary">{hit.cousine}</div>
                </div>
                <div className="mt-2 flex items-center justify-between">
                    <div className="rating">
                        <input
                            type="radio"
                            name="rating-2"
                            className="mask mask-star-2 bg-orange-400"
                        />
                        <input
                            type="radio"
                            name="rating-2"
                            className="mask mask-star-2 bg-orange-400"
                        />
                        <input
                            type="radio"
                            name="rating-2"
                            className="mask mask-star-2 bg-orange-400"
                        />
                        <input
                            type="radio"
                            name="rating-2"
                            className="mask mask-star-2 bg-orange-400"
                        />
                        <input
                            type="radio"
                            name="rating-2"
                            className="mask mask-star-2 bg-orange-400"
                        />
                    </div>
                    <a href={`/places/${hit.id}`} className="btn btn-primary">
                        See more
                    </a>
                </div>
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
        attribute: "cousine",
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
