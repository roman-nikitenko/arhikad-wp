const gulp = require("gulp");
const sass = require("gulp-dart-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const livereload = require("gulp-livereload");
const webpack = require("webpack-stream");
const rename = require("gulp-rename");

const paths = {
  css: {
    src: "assets/src/scss/style.scss",
    watch: "assets/src/scss/**/*.scss",
    dest: "assets/css/",
  },
  js: {
    src: "assets/src/js/index.js",
    watch: "assets/src/js/**/*.js",
    dest: "assets/js/",
  },
  adminStyles: {
    src: "assets/src/scss/gutenberg.scss",
    watch: "assets/src/scss/gutenberg.scss",
    dest: "assets/css/gutenberg",
  }
};

function styles() {
  return gulp
    .src(paths.css.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer]))
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(sourcemaps.write("/maps"))
    .pipe(gulp.dest(paths.css.dest))
    .pipe(livereload());
}

function scripts() {
  return gulp
    .src(paths.js.src)
    .pipe(
      webpack({
        devtool: "source-map",
        mode: "production",
      })
    )
    .pipe(gulp.dest(paths.js.dest));
}

function admin_styles() {
  return gulp
    .src(paths.adminStyles.src)
    .pipe(sass().on("error", sass.logError))
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError))
    .pipe(rename("opti-gutenberg.css"))
    .pipe(gulp.dest(paths.adminStyles.dest));
}

function watch() {
  livereload.listen();
  gulp.watch(paths.css.watch, gulp.series(styles));
  gulp.watch(paths.js.watch, gulp.series(scripts));
  gulp.watch(paths.adminStyles.watch, gulp.series(admin_styles));
}

exports.default = gulp.series(styles, scripts, watch);
exports.build = gulp.series(styles, scripts)
exports.adminStyles = gulp.series(admin_styles);
