module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                'soft-theme-light': '#FDF6E3',
                'bitter-theme-light': '#ff0',
                'thick-theme-light': '#586E75',
                'dark-theme-light': '#465C62',
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['hover', 'disabled'],
            borderColor: ['hover', 'focus', 'disabled'],
            cursor: ['hover', 'focus', 'disabled'],
            opacity: ['disabled'],
        },
    },
    plugins: [],
};
