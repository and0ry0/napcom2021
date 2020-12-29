const tailwindcss = require("tailwindcss");
const purgecss = require("@fullhuman/postcss-purgecss");
const purgecssWordpress = require("purgecss-with-wordpress");

module.exports = {
  plugins: [
    require('postcss-import'),
    require('postcss-nested'),
    require('postcss-simple-vars'),
    require('postcss-nested-import'),
    require("autoprefixer"),
    tailwindcss("./tailwind.config.js"),
    

    // WordPress対応 (https://viarami.com/programming/tailwind-css-wordpress-theme/)
    process.env.NODE_ENV === "production" &&
    purgecss({
      content: ["./**.php", "./**/**.php", "./**.html", "./**.js"],
      safelist: purgecssWordpress.safelist,
      safelistPatterns: purgecssWordpress.safelistPatterns,
      defaultExtractor: (content) => content.match(/[A-Za-z0-9-_:/]+/g) || [],
    }),

    // 圧縮
    require('cssnano')({
      autoprefixer: false
    }),
  ],
};