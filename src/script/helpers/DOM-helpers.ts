export const $ = document.querySelector.bind(document);
export const $$ = document.querySelectorAll.bind(document);
Element.prototype.$ = Element.prototype.querySelector;
Element.prototype.$$ = Element.prototype.querySelectorAll;
EventTarget.prototype.on = EventTarget.prototype.addEventListener;
EventTarget.prototype.off = EventTarget.prototype.removeEventListener;