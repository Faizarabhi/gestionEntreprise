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
        'bg-bleu': '#E0E0FF',
        'scroll-bleu': '#657093',
        
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require("daisyui"),
    require('tailwind-scrollbar')
  ],
  variants: {
    scrollbar: ['rounded']
}
  
}
