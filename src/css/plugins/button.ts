import plugin from "tailwindcss/plugin";

export default plugin(function ({ addComponents }) {
    const baseButtonStyles = {
        color: "var(--text-color, inherit)",
        fontSize: "var(--font-size, inherit)",
        fontWeight: "var(--font-weight, 500)",
        padding: "var(--padding, 0.75rem 2rem)",
        backgroundColor: "var(--bg-color, inherit)",
        borderWidth: "var(--border-width, 0)",
        borderColor: "var(--border-color)",
        display: "inline-block",
        transitionProperty:
            "var(--transition-properties, (padding, background-color, color, border-width))",
        transitionDuration: "350ms",
    };
    // Define button styles
    const buttons = {
        ".btn": {
            ...baseButtonStyles,
            "--padding-left": "1.5rem",
            "--padding-right": "0.25rem",
            "--padding-top": "0.25rem",
            "--padding-bottom": "0.25rem",
            "--padding": "var(--padding-top) var(--padding-right) var(--padding-bottom) var(--padding-left)",
            "--font-weight": "400",
            display: "inline-flex",
            "align-items": "center",
            "--border-color": "rgba(255, 255, 255, 0.1490196078)",
            "--border-width": "1px",
            "--font-size": "1.125rem",
            "cursor": "pointer",
        },
        ".btn:after": {
            content: "''",
            "background-image": `url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3E%3Cpath fill='%23000' d='M1.146 10.854a.5.5 0 0 1 0-.708L9.293 2H4.47a.5.5 0 0 1 0-1h6.03a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V2.707l-8.146 8.147a.5.5 0 0 1-.708 0'/%3E%3C/svg%3E")`,
            "background-size": "18px 18px",
            "background-repeat": "no-repeat",
            "background-position": "center",
            width: "3rem",
            "aspect-ratio": "1",
            "margin-left": "auto",
            "border-radius": "50%",
            "background-color": "white",
        },
        ".btn-white": {
            "--bg-color": "white",
            "--text-color": "black"
        },

        ".btn-white:after": {
            "background-image": ` url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%23fff' fill-rule='evenodd' d='M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z'/%3E%3C/svg%3E")`,
            "background-color": "black",
        },
    };
    addComponents(buttons);
});
