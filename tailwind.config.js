module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            opacity: ['disabled'],
            cursor: ['hover', 'focus', 'disabled'],
            backgroundColor: ['hover', 'disabled']
        },
    },
    plugins: [],
};
