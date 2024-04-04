import "./bootstrap";
import { Modal } from 'bootstrap';
import "./vendor.bundle";
import "./theme.bundle";

import Alpine from "alpinejs";
import jQuery from "jquery";
// import * as Bootstrap from 'bootstrap';
window.Alpine = Alpine;
// window.Boo = Bootstrap;
window.Moo = Modal;
window.$ = jQuery;

Alpine.start();
