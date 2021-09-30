const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));


gulp.task('message', async function () {
    return console.log('gulp is running..');
});

gulp.task('sass', function () {
    return gulp.src('sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('css/'));
});

gulp.task('watch', function () {
    gulp.watch('sass/*.scss', gulp.series('sass'));

});

