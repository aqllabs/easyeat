import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
import path from "path";

export default defineConfig({
    resolve: {
        alias: {
            "@mingle": path.resolve(
                __dirname,
                "/vendor/ijpatricio/mingle/resources/js"
            ),
        },
    },
    plugins: [
        react(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/directory/MapList.js",
            ],
            refresh: [...refreshPaths, "resources/js/*", "app/**"],
        }),
    ],
});
