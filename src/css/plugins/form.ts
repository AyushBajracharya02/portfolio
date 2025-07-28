import plugin from "tailwindcss/plugin";

export default plugin(function ({ addComponents }) {
    const buttons = {
        ".form-label": {
            display: "block",
            fontSize: "1.25rem",
            fontWeight: "500",
        },
        ".form-label:has(+ .form-input:user-invalid)": {
            color: "var(--color-red-700)",
        },
        ".form-input": {
            display: "block",
            width: "100%",
            padding: "0.5rem 0",
            borderBottom: "1px solid",
            borderColor: "rgba(255, 255, 255, 0.3)",
            transitionProperty: "border-color",
            transitionDuration: "500ms",
        },
        ".form-input:is(textarea)": {
            minHeight: "10rem",
            resize: "none",
        },
        ".form-input:is(:focus-visible,:focus)": {
            outline: "none",
            borderColor: "rgba(255, 255, 255, 1)",
        },
        ".form-input:user-invalid":{
            borderColor: "var(--color-red-700)",
        },
        ".form-error": {
            display: "none",
            color: "var(--color-red-700)",
        },
        ".form-input:user-invalid + .form-error": {
            display: "block",
        },
    };
    addComponents(buttons);
});
