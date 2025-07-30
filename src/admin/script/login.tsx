import React from 'react';
import { createRoot } from "react-dom/client";
import { $ } from "../../script/helpers/DOM-helpers";
import App from "./components/app";

createRoot($("#root")!).render(<App />);