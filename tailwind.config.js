module.exports = {
  purge: false,
  darkMode: false, // or 'media' or 'class'
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      'napoan': '#2687e8',
      'twitter': '#2795E9',
      'prevlink': 'rgba(0,0,0,0.5)'
     }),
    screens: {
      'sm': '640px',
      'md': '768px',

      // 元は1024px
      'lg': '940px',
      'xl': '1280px',
      '2xl': '1536px',

      // オリジナル
      '650': '650px',
      '960': '960px',
      '1000': '1000px',
      '1200': '1200px',
    },
    extend: {
      width: {
        'sm': '640px',
        '200': '200px',
        '250': '250px',
        '650': '650px',
        '960': '960px',
        '1200': '1200px',
        '1400': '1400px'
      },
      fontFamily: {
        'napoicon': ['napo-icon2']
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
