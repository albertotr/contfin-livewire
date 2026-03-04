import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            detectTls: false, // Desabilitar detecção TLS no Docker
        }),
        tailwindcss(),
    ],
    server: {
        host: "0.0.0.0", // Permite conexões externas
        port: 5173,
        strictPort: true, // Não mudar porta se 5173 estiver ocupada
        cors: {
            origin: ["http://localhost:8000", "http://localhost:5173"],
            credentials: true,
        },
        hmr: {
            host: "localhost", // Host para HMR
            protocol: "ws", // WebSocket para hot reload
            clientPort: 5173, // Porta do cliente
        },
        watch: {
            usePolling: true, // Necessário para Docker
            interval: 1000,
            ignored: ["**/storage/framework/views/**"],
        },
        watch: {
            usePolling: true, // ESSENCIAL para Docker
            interval: 1000, // Polling a cada 1 segundo
            ignored: [
                "**/vendor/**",
                "**/node_modules/**",
                "**/storage/**",
                "**/bootstrap/cache/**",
            ],
        },
    },
});
