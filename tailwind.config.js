const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: {
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/hiperprecios/**/*.blade.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'xxs': ['0.625rem', '0.75rem'],
            },
            inset: {
                '76': '18.75rem',
            },
            colors: {
                red: colors.red,
                green: colors.green,
                black: colors.black,
                white: colors.white,
                'brand': {
                    '50': '#fafcfd',
                    '100': '#f5f9fb',
                    '200': '#e5f0f6',
                    '300': '#d6e6f0',
                    '400': '#b7d4e4',
                    '500': '#98C1D9',
                    '600': '#89aec3',
                    '700': '#7291a3',
                    '800': '#5b7482',
                    '900': '#4a5f6a'
                },
                'primary': {
                    '50': '#fef8f6',
                    '100': '#fdf0ed',
                    '200': '#fbdad3',
                    '300': '#f8c4b8',
                    '400': '#f39882',
                    '500': '#EE6C4D',
                    '600': '#d66145',
                    '700': '#b3513a',
                    '800': '#8f412e',
                    '900': '#753526'
                },
                'secondary': {
                    '50': '#f5f7f9',
                    '100': '#eceff2',
                    '200': '#cfd6df',
                    '300': '#b1bdcc',
                    '400': '#778ca6',
                    '500': '#3D5A80',
                    '600': '#375173',
                    '700': '#2e4460',
                    '800': '#25364d',
                    '900': '#1e2c3f'
                },
                'light': {
                    '50': '#fdffff',
                    '100': '#fcffff',
                    '200': '#f7fefe',
                    '300': '#f3fdfe',
                    '400': '#e9fcfd',
                    '500': '#E0FBFC',
                    '600': '#cae2e3',
                    '700': '#a8bcbd',
                    '800': '#869797',
                    '900': '#6e7b7b'
                },
                'dark': {
                    '50': '#f4f5f6',
                    '100': '#eaebec',
                    '200': '#caccd0',
                    '300': '#a9adb3',
                    '400': '#69707a',
                    '500': '#293241',
                    '600': '#252d3b',
                    '700': '#1f2631',
                    '800': '#191e27',
                    '900': '#141920'
                }
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['active'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
