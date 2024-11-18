/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        grey: {
          200: 'rgb(228 235 253)', // Atualizado com o valor desejado
          400: '#DBE1F3', // Cinza médio (pode ser ajustado conforme necessário)
          700: '#374151', // Cinza escuro
        },
        'dark-grey': {
          900: '#111827', // Cinza bem escuro
        },
        'purple-blue': {
          100: '#D2DCFA', // Exemplo de cor clara
          500: '#29388f', // Exemplo de cor média
          600: '#551ce5', // Exemplo de cor mais escura
        },
        'wine': {
          100: '#E8A2B1', // Exemplo de cor clara (uma tonalidade mais clara de #681726)
          500: '#681726', // Cor principal
          600: '#4A0F1B', // Exemplo de cor mais escura (uma tonalidade mais escura de #681726)
        },
      }
    },
  },
  plugins: [],
}

