/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/header.blade.php",
    "./resources/views/footer.blade.php",
    "./resources/views/landing_page.blade.php",
    "./resources/views/rslt_search_movie.blade.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        museo: ['MuseoModerno', 'Arial','sans-serif'],
    },
  },
  plugins: [],
}}