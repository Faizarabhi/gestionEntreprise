module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary':'#FFAA4C',
        'secondary': '#001E6C',
        'white' : '#fff',
        'dash-bleu': '#001E6C',
        // 'bg-bleu': '#121212',
        'bg-bleu': '#F9F9F9',
        'scroll-bleu': '#657093',
        'vert':'#01D758',
        
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
