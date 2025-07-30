import path from "path";
import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
// import react from "@vitejs/plugin-react";

export default defineConfig({
   plugins: [
      tailwindcss(),
      // react(),
   ],
   build: {
      emptyOutDir: true,
      // cssMinify: true,
      rollupOptions: {
         input: {
            main: "src/script/main.ts",
            style: "src/css/style.css",
            admin: "src/admin/css/admin.css",
            login: "src/admin/script/login.tsx",
         },
         output: {
            entryFileNames: "assets/[name].js",
            chunkFileNames: "assets/[name].js",
            assetFileNames: (assetInfo) => {
               if (assetInfo.names[0].endsWith(".css")) {
                  return `assets/[name][extname]`;
               }
               return assetInfo.originalFileNames[0];
            },
         },
      },
   },
   css: {
      devSourcemap: true,
   },
   server: {
      cors: {
         origin: "http://portfolio.test",
      },
   },
   resolve: {
      alias: {
         "@": path.resolve(__dirname, "./src"),
      },
   },
});
