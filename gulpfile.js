const gulp = require('gulp');
const uglify = require('gulp-uglify');

const sass = require('gulp-sass')(require('sass'));


gulp.task('message', async function(){
    return console.log('gulp is running..');
});

gulp.task('sass', function(){
    return gulp.src('sass/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('css/'));
});

gulp.task('minify', async function(){
    gulp.src('css/*.css')
    .pipe(uglify())
       .pipe(gulp.dest('css/dest/'));
});

gulp.task('watch', function() {
    gulp.watch('sass/*.scss', gulp.series('sass'));
    gulp.watch('minify/*.css', gulp.series('minify'));
});

