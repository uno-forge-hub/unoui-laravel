import { defineConfig, presetWind3, presetIcons } from "unocss";
import { flexillaPreset } from "@unifydev/flexilla";
import { presetUI } from "@unifydev/preset-ui";
import icons from "@iconify-json/ph";

export default defineConfig({
    content: {
        filesystem: ["./resources/views/**/*.blade.php", "./resources/**/*.js"],
    },
    shortcuts: {
        "nav-sub-item-ind":
            "before-absolute before-content-empty before-top-1/2 before-left-4 before--translate-y-1/2 before-w0.5 before-rd-lg before-h5 fx-active-before-bg-primary before-flex",
        "dash-container": "mx-a lg-max-w-94rem",
    },
    presets: [
        presetWind3({ dark: "class" }),
        presetIcons({
            collections: {
                // Use the `icons` object directly from '@iconify-json/ph'
                ph: icons,
            },
        }),
        presetUI(),
        flexillaPreset(),
    ],
});
