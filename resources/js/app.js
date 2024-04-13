import "./bootstrap";

import * as bootstrap from "bootstrap";
import "@popperjs/core";
import "./sb-admin-2";

import Alpine from "alpinejs";
import Aos from "aos";

window.Alpine = Alpine;
window.Aos = Aos;
window.bootstrap = bootstrap;

Alpine.start();
Aos.init();
