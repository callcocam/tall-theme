const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        // require('./packages/tall-cms/tailwind.config'),
        // require('./packages/tall-acl/tailwind.config'),
        // require('./packages/tall-table/tailwind.config'),
        // require('./packages/tall-orm/tailwind.config'),
        // require('./packages/tall-form/tailwind.config'),
        require('./packages/tall-theme/tailwind.config'),
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './packages/**/resources/views/*.php',
        './resources/views/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
