const gulp = require("gulp");
const plumber = require("gulp-plumber");
const sourcemap = require("gulp-sourcemaps");
const autoprefixer = require('autoprefixer');
const sass = require("gulp-sass")(require('sass'));
const postcss = require("gulp-postcss");
const csso = require("gulp-csso");
const rename = require("gulp-rename");
const sync = require("browser-sync").create();
const uglify = require('gulp-uglify');
const { src, dest, series } = require('gulp');

// Styles

const css = () => {
    return src("css/style.scss")
        .pipe(plumber())
        .pipe(sourcemap.init())
        .pipe(sass())
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(dest("css"))
        .pipe(csso())
        .pipe(rename("style.min.css"))
        .pipe(sourcemap.write("."))
        .pipe(dest("css"));
}

exports.css = css;

const js = () => {
  return src("js/source/**/*.js")
    .pipe(uglify())
    .pipe(dest("js"));
};

exports.js = js;

// Server

const server = (done) => {
  sync.init({
    server: {
      //baseDir: ''
      serveStatic: '.'
    },
    cors: true,
    notify: false,
    ui: false,
  });
  done();
}

exports.server = server;

const refresh = (done) => {
  sync.reload();
  done();
}

exports.refresh = refresh;

// Watcher

const watcher = () => {
  gulp.watch("/js/source/**/*.js", series(js, refresh));
  gulp.watch("css/**/*.scss", series(css, refresh));
  //gulp.watch("source/img/icon-*.svg", series(sprite, refresh));
  gulp.watch("*.html", refresh);
}

exports.default = series(
  css, server, watcher
);

exports.build = series(css, js);
exports.start = series(exports.build, server, watcher);
