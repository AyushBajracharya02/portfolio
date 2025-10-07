import React from 'react';
import { createRoot } from "react-dom/client";
import { $ } from "../../script/helpers/DOM-helpers";
import SignUp from './components/Sign-Up';

createRoot($("#root")!).render(<SignUp />);