/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.{html,php}"],
  theme: {
    extend: {
      colors: {
        "blue": "#313866",
        "violet": "#504099",
        "pink-violet": "#974EC3",
        "pink": "#FE7BE5",
      },
    },
    fontFamily: {
      "display": ['Mochiy Pop One', "sans-serif"]
    }
   
  },
  plugins: [],
}
