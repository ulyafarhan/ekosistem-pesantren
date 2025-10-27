// tailwind.config.js

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './app/Filament/**/*.php', // Penting untuk Filament
    './resources/views/filament/**/*.blade.php', // Penting untuk Filament
    './vendor/filament/**/*.blade.php', // Penting untuk Filament
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}