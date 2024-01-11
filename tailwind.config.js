const defaultTheme = require('tailwindcss/defaultTheme');

const plugin = require("tailwindcss/plugin");

const hoveredParentPlugin = plugin(function ({ addVariant, e }) {
  addVariant("hovered-parent", ({ container }) => {
    container.walkRules((rule) => {
      rule.selector = `:hover > .hovered-parent\\:${rule.selector.slice(1)}`;
    });
  });
});

const focusedWithinParentPlugin = plugin(function ({ addVariant, e }) {
    addVariant("focused-within-parent", ({ container }) => {
      container.walkRules((rule) => {
        rule.selector = `:focus-within > .focused-within-parent\\:${rule.selector.slice(1)}`;
      });
    });
});

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
	hoveredParentPlugin,
        focusedWithinParentPlugin,
	require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
