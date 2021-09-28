var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));




gulp.task('sass', function(){
    return gulp.src('sass/home_ano.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('css/'));
});


gulp.task('watch', function() {
    gulp.watch('sass/*.scss', ['sass']);
});

