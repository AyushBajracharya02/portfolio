import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],
    build: {
        emptyOutDir: true,
        // cssMinify: true,
        rollupOptions: {
            input: {
                main: 'src/script/main.ts',
                style: 'src/css/style.css',
            },
            output: {
                entryFileNames: 'assets/[name].js',
                chunkFileNames: 'assets/[name].js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.names[0].endsWith('.css')) {
                        return `assets/[name][extname]`;
                    }
                    return assetInfo.originalFileNames[0];
                }
            }
        }
    },
    css: {
        devSourcemap: true,
    },
    server: {
        cors: {
            origin: 'http://portfolio.test'
        },
    }
})