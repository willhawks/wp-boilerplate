const { watch, parallel, series, src } = require('gulp');
const livereload = require('gulp-livereload');

const { devJS, prodJS } = require('./javascript');
const { devScss, prodScss } = require('./scss');
const { images } = require('./images');

function refresh(cb) {
  return src('index.php').pipe(livereload());
}

function watchFiles() {
  livereload.listen();
  watch(['src/js/**/*.js'], series(devJS, refresh));
  watch(['src/scss/**/*.scss'], devScss);
  watch(['src/images/**/*'], { events: 'add' }, images);
  watch(['**/*.php'], refresh);
}

// exports.watchJS = watchJS;
exports.images = images;
exports.scss = devScss;
exports.js = devJS;
exports.watch = watchFiles;
exports.default = parallel(series(devJS, prodJS), prodScss);
exports.prodJS = prodJS;
exports.prodScss = prodScss;