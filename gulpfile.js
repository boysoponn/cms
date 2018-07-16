
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

/*******************บรรจุ PATH JS***************************/
var js=['./jqury.js','./src/js/cms.js']
/******************************************************/

gulp.task('sass', function () {
  return gulp.src('./src/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./bliud/css'));
});
 
gulp.task('scripts', function() {
  return gulp.src(js)
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./bliud/js'));
});

gulp.task('watch', function () {
  gulp.watch('./src/sass/*.scss', ['sass']);
  gulp.watch(js, ['scripts']);
  return gulp.src(js)
  .pipe(concat('main.js'))
  .pipe(gulp.dest('./bliud/js'));

});

gulp.task('default',['scripts','sass','watch'], function() {
});