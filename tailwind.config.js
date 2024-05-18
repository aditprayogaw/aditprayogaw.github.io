/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['index.html'],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    extend: {
      backgroundImage: {
        'hero-image': 'URL("https://static.vecteezy.com/system/resources/previews/000/256/154/original/abstract-grey-geometric-polygon-background-vector.jpg")',
      },  

      colors: {
        warna_1: '#000814',
        warna_2: '#001d3d',
        warna_3: '#003566',
        warna_4: '#ffc300',
        warna_5: '#ffd60a',
      },
      screens: {
        '2xl': '1320px'
      },
    },
  },
  plugins: [],
}

