import React from "react";
import { createRoot } from "react-dom/client";
import { $ } from "../../script/helpers/DOM-helpers";
import Dashboard from "./components/Dashboard";

createRoot($("#root")!).render(<Dashboard />);
