var gulp = require('gulp');
var pug = require('gulp-pug');
var rename = require('gulp-rename');

gulp.task('pug', () => {
 return gulp.src(['./resources/assets/pug/form_sample/**/*.pug', '!./resources/assets/pug/form_sample/**/_*.pug'])
 .pipe(pug({
   pretty: true
 }))
 .pipe(rename({
     extname: ".blade.php"
 }))
 .pipe(gulp.dest('./resources/views/form_sample'));
});