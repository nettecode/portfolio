var gulp = require('gulp');
var browserSync = require('browser-sync');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var plumber = require('gulp-plumber');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var minifyHTML = require('gulp-minify-html');
var csslint = require('gulp-csslint');
var connect = require('gulp-connect-php');

var srcPaths = {
    other: ['./www/css/lib/*', './www/fonts/*', './www/img/**/*', './www/json/*', './www/lib/*', './www/*.php']
};

var destPaths = {
    other: ['./tmp/css/lib', './tmp/fonts', './tmp/img', './tmp/json', './tmp/lib', './tmp']
};

gulp.task('concat-js', function () {
    gulp.src('./www/js/*.js')
        .pipe(plumber())
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./tmp/js'));
});

gulp.task('check-js', function () {
    gulp.src('./www/js/*.js')
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
});

gulp.task('concat-css', function () {
    gulp.src('./www/css/*.css')
        .pipe(plumber())
        .pipe(concat('main.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('./tmp/css'));
});

gulp.task('check-css', function() {
    gulp.src('./www/css/*.css')
        .pipe(csslint())
        .pipe(csslint.reporter());
});

gulp.task('copy', function () {
    srcPaths.other.forEach(function (path, i) {
        gulp.src(path)
            .pipe(plumber())
            .pipe(gulp.dest(destPaths.other[i]));
    });
});

gulp.task('minify-html', function() {
    var opts = {
        conditionals: true,
        spare:true
    };

    return gulp.src('./www/*.html')
        .pipe(minifyHTML(opts))
        .pipe(gulp.dest('./tmp'));
});

gulp.task('php', function() {
    connect.server({ base: 'tmp', port: 8010, keepalive: true});
});

gulp.task('browser-sync',['php'], function() {
    browserSync({
        proxy: '127.0.0.1:8010',
        port: 8080,
        open: true,
        notify: false
    });
});

gulp.task('serve', ['browser-sync'], function () {
    gulp.run(['check-js', 'concat-js', 'check-css', 'concat-css', 'copy']);

    gulp.watch("www/css/*.css").on('change', function () {
        gulp.run(['check-css', 'concat-css']);
        browserSync.reload;
    });
    gulp.watch("www/js/*.js").on('change', function () {
        gulp.run(['check-js', 'concat-js']);
        browserSync.reload;
    });
    gulp.watch("www/*.html").on('change', function () {
        gulp.run(['minify-html']);
        browserSync.reload;
    });
    gulp.watch("www/*.json").on('change', function () {
        gulp.src(srcPaths.other[3])
            .pipe(plumber())
            .pipe(gulp.dest(destPaths.other[3]));
        browserSync.reload;
    });
    gulp.watch('www/*.php').on('change', function () {
        browserSync.reload;
    });
});

gulp.task('default', ['serve']);