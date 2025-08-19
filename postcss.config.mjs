import UnoCSS from '@unocss/postcss'

export default {
    plugins: [
        UnoCSS({
            content: ['/resources/views/**/*.blade.php', './resources/**/*.js']
        }),
    ],
}
