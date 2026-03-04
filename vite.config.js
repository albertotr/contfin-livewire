import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig(({ command, mode }) => {
    const isProduction = mode === "production";

    return {
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/js/app.js"],
                refresh: !isProduction, // Só refresh em desenvolvimento
                detectTls: false,
            }),
            tailwindcss(),
        ],
        // Configurações que só aplicam em desenvolvimento
        ...(!isProduction && {
            server: {
                host: "0.0.0.0",
                port: 5173,
                strictPort: true,
                cors: {
                    origin: ["http://localhost:8000", "http://localhost:5173"],
                    credentials: true,
                },
                hmr: {
                    host: "localhost",
                    protocol: "ws",
                    clientPort: 5173,
                },
                watch: {
                    usePolling: true,
                    interval: 1000,
                    ignored: [
                        "**/vendor/**",
                        "**/node_modules/**",
                        "**/storage/**",
                        "**/bootstrap/cache/**",
                    ],
                },
            },
        }),
        // Configurações de build para produção
        build: {
            manifest: "manifest.json",
            outDir: "public/build",
            rollupOptions: {
                output: {
                    manualChunks: undefined,
                },
            },
        },
    };
});
