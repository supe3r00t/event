// tailwind.config.js
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          DEFAULT: "#366196",
          dark: "#333564",
        },
      },
    },
  },
  plugins: [],
}
