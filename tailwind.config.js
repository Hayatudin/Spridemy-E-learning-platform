/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/index.php", "./PHP/**/*.php", "./src/**/*.{html,js}"],
  theme: {
    screens: {
      sm: "340px",
      md: "540px",
      lg: "768px",
      xl: "1180px"
    },
    extend: {},
    fontFamily: {
      roboto: ["Roboto", "serif"],
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "8px",
        lg: "12px"
      },
    },
  },
  plugins: [],
};
