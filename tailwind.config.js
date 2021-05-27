const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: '#151724',
        secondary: '#242834',
        ternary: '#D8D1CF',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
