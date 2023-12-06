/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.{html,php}"],
  theme: {
    extend: {
      colors: {
        accent: "#5A5874",
        primary: "#CBCDBC",
        secondary: "#C5D3CD",
        bckgrd: "#F6F3F5",
      },
    },
    fontFamily: {
      sans: ["Poppins", "sans-serif"],
    },
  },
  plugins: [],
};
