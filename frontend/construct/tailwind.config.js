module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#FFBD35',
        'secondary': '#1A5F7A',
        'white' : '#fff',
        'dash-bleu': '#081A51',
        'bg-bleu': '#F8F9FF',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
