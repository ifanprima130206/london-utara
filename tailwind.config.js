// tailwind.config.js

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      keyframes: {
        slideInRight: {
          '0%': { transform: 'translateX(100%)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        slideOutRight: {
          '0%': { transform: 'translateX(0)', opacity: '1' },
          '100%': { transform: 'translateX(100%)', opacity: '0' },
        },
      },
      animation: {
        slideInRight: 'slideInRight 0.5s forwards',
        slideOutRight: 'slideOutRight 0.5s forwards',
        fadeIn: 'fadeIn 0.5s forwards',
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require("tailgrids/plugin"),
  ],
};
