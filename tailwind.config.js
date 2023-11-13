/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php"],
  theme: {
    fontFamily: {
      "title": ['"Prosto One"'],
      "main": ['"Didact Gothic"'],
      "console": ['"Cascadia Mono"'],
      "pixel": ['"Press Start 2P"'],
    },
    colors: {
      white: "#ffffff",
      purple: "#A84FAB",
      'purple-800': "#7D30BA",
      azur: "#30BABA",
      green: "#98C379",
      blue: "#61AFEF",
      dark: "#282E36",
      main: "#131D29",
      console: "#38404C",
      consoleText: "#DCDFE4",
    },
    keyframes: {
      pulse: {
        '0%, 100%': {
          opacity: '1'
        },
        '50%': {
          opacity: '0'
        }
      }
    },
    extend: {},
  },
  plugins: [
    require('tailwind-scrollbar')({ nocompatible: true }),
  ],
}

