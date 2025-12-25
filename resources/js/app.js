import offcanvasPlugin from "@flexilla/alpine-offcanvas";
import Collapse from "@flexilla/alpine-collapse"
import Modal from "@flexilla/alpine-modal";
import Dropdown from "@flexilla/alpine-dropdown";
import { disableTransitionsTemporarily } from "./utils";


Alpine.plugin(offcanvasPlugin);
Alpine.plugin(Collapse);
Alpine.plugin(Modal)
Alpine.plugin(Dropdown)




document.addEventListener("alpine:init", () => {
    Alpine.store("theme", {
        isDark: false,
        init() {
            const localTheme = localStorage.getItem("theme");
            const systemPrefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)"
            ).matches;

            if (localTheme) {
                this.isDark = localTheme === "dark";
            } else {
                this.isDark = systemPrefersDark;
            }

            this.updateTheme();
            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", (e) => {
                    if (!localStorage.getItem("theme")) {
                        this.isDark = e.matches;
                        this.updateTheme();
                    }
                });

            document.addEventListener("livewire:navigated", () => {
                disableTransitionsTemporarily(() => {
                    document.documentElement.classList.toggle(
                        "dark",
                        this.isDark
                    );
                });
            });
        },

        toggle() {
            this.isDark = !this.isDark;
            this.updateTheme();
        },

        setToDark() {
            this.isDark = true;
            this.updateTheme();
        },

        setToLight() {
            this.isDark = false;
            this.updateTheme();
        },

        updateTheme() {
            disableTransitionsTemporarily(() => {
                document.documentElement.classList.toggle("dark", this.isDark);
                localStorage.setItem("theme", this.isDark ? "dark" : "light");
                window.dispatchEvent(new CustomEvent("theme-changed", {
                    detail: { theme: this.isDark ? "dark" : "light", isDark: this.isDark }
                }));
            });
        },
    });
});

document.addEventListener("livewire:navigated", () => {
    const theme =
        localStorage.getItem("theme") ||
        (window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light");
    document.documentElement.classList.toggle("dark", theme === "dark");
});

window.toggleTheme = function () {
    const currentTheme =
        localStorage.getItem("theme") ||
        (document.documentElement.classList.contains("dark")
            ? "dark"
            : "light");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    localStorage.setItem("theme", newTheme);
    document.documentElement.classList.toggle("dark", newTheme === "dark");
    window.dispatchEvent(
        new CustomEvent("theme-changed", {
            detail: { theme: newTheme },
        })
    );
};


