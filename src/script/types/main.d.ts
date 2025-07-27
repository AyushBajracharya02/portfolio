export { };

declare global {
    interface Element {
        $: typeof Element.prototype.querySelector;
        $$: typeof Element.prototype.querySelectorAll;
    };
    interface EventTarget {
        on: typeof EventTarget.prototype.addEventListener;
        off: typeof EventTarget.prototype.removeEventListener;
    };
};