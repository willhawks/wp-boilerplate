const browserify = require('browserify');
const gulp = require('gulp');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');

const sass = require('gulp-sass');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
// const jshint = require('gulp-jshint');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const streamqueue = require('streamqueue');

gulp.task('styles', () => {
  return streamqueue(
    { objectMode: true },
    gulp.src('./node_modules/normalize.css/normalize.css')
      .pipe(sourcemaps.init()),
    // Add other external stylesheets to concatinate here with gulp.src().
    gulp.src('assets/scss/main.scss')
      .pipe(sass().on('error', sass.logError)),
  )
  .pipe(concat('main.css'))
  .pipe(gulp.dest('dist'))
  .pipe(postcss([
    autoprefixer({browsers: ['last 2 versions']}),
    cssnano(),
  ]))
  .pipe(rename({suffix: '.min'}))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('dist'));
});

gulp.task('dev_styles', () => {
  return streamqueue(
    { objectMode: true },
    gulp.src('./node_modules/normalize.css/normalize.css')
      .pipe(sourcemaps.init()),
    // Add other external stylesheets to concatinate here with gulp.src().
    gulp.src('assets/scss/main.scss')
      .pipe(sass().on('error', sass.logError)),
  )
  .pipe(concat('main.css'))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('dist'));
});


gulp.task('dev_scripts',() => {
  return browserify({
    entries: ['./assets/index.js'],
    debug: true
  })
    .bundle()
    //Pass desired output filename to vinyl-source-stream
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
      // Add transformation tasks to the pipeline here.
      // .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    // Start piping stream to tasks!
    .pipe(gulp.dest('./dist/'));
});

gulp.task('scripts', () => {

  return browserify({
    entries: ['./assets/index.js'],
    debug: true
  })
    .bundle()
    //Pass desired output filename to vinyl-source-stream
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
      // Add transformation tasks to the pipeline here.
      .pipe(babel())
      .pipe(gulp.dest('./dist/'))
      .pipe(uglify())
      .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write('./'))
    // Start piping stream to tasks!
    .pipe(gulp.dest('./dist/'));

});



gulp.task('default', () => {
    gulp.start('styles', 'scripts' );
});

gulp.task('watch', () => {

  // Watch .scss files
  gulp.watch('assets/scss/**/*.scss', ['dev_styles']);

  // Watch .js files
  gulp.watch('assets/js/**/*.js', ['dev_scripts']);

});
