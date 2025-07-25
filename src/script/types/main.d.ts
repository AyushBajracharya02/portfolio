export { };

declare global {
    interface Element {
        $: typeof Element.prototype.querySelector;
        $$: typeof Element.prototype.querySelectorAll;
    };
};