var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    rename = require('gulp-rename'),
    include = require('gulp-include'),
    minifyCSS = require('gulp-minify-css'),
    mqpacker = require('gulp-combine-media-queries'),
    imageOptim = require('gulp-imageoptim'),
    gutil = require('gulp-util'),
    fs = require('fs'),
    ftp = require('gulp-ftp'),
    package = require('./package.json');

function handleError(err) {
    console.log(err.toString());
    this.emit('end');
}

gulp.task('css', function () {
    return gulp.src('sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest('./'))
        .pipe(minifyCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('admincss', function () {
    return gulp.src('sass/admin.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(minifyCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('jshint', function(){
    return gulp.src('js/**/*.js')
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('default'));
});

gulp.task('js',function(){
    return gulp.src('js/script.js')
        .pipe( include() )
        .pipe(gulp.dest('assets/js'))
        .pipe(uglify())
        .on('error', handleError)
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/js'))
        .pipe(browserSync.reload({stream:true, once: true}));
});

gulp.task('images', function() {
    return gulp.src('img/**/*')
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest('assets/img'));
});

gulp.task('browser-sync', function() {
    browserSync({
        proxy: "promesse-damour.dev"
    });
});

gulp.task('bs-reload', function () {
    browserSync.reload();
});

gulp.task('default', ['css', 'admincss', 'js', 'jshint', 'browser-sync'], function () {
    gulp.watch("scss/**/*.scss", ['css', 'admincss']);
    gulp.watch("js/**/*.js", ['js', 'jshint']);
    gulp.watch("**/*.php", ['bs-reload']);
    gulp.watch("assets/img/**/*", ['bs-reload']);
});
