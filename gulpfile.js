// Include gulp
var gulp = require('gulp');
 // Include plugins
var concat = require('gulp-concat');
 // Concatenate JS Files
gulp.task('scripts', function() {
    return gulp.src('src/scripts/*.js')
      .pipe(concat('main.js'))
      .pipe(gulp.dest('dist/wp-content/themes/eliteempresarial-child/js'));
});
 // Default Task
gulp.task('default', ['scripts']);

// generate critical CSS
gulp.task( 'styles-critical', function() {

    // prevent Node from balking at self-signed ssl cert
    process.env.NODE_TLS_REJECT_UNAUTHORIZED = 0;

    // run critical css
    critical.generate({
        /* note: cannot use 'base:' or will break remote 'src:' */

        // we want css, not html
        inline: false,

        // css source file
        css: 'src/styles/style.css',

        // css destination file
        dest: 'dist/wp-content/themes/eliteempresarial-child/critical-min.css',

        // page to use for picking critical
        src: 'https://www.ruymanborges.com/',

        // make sure the output is minified
        minify: true,

        // pick multiple dimensions for top nav
        dimensions: [{
            height: 500,
            width: 300
        }, {
            height: 600,
            width: 480
        }, {
            height: 800,
            width: 600
        }, {
            height: 940,
            width: 1280
        }, {
            height: 1000,
            width: 1300
        }, {
            height: 1200,
            width: 1800
        }, {
            height: 1200,
            width: 2300
        }]
    });
});

var plugins = require('gulp-load-plugins')();

const gulp = require('gulp');
const changed = require('gulp-changed');
const ngAnnotate = require('gulp-ng-annotate'); // Just as an example 
 
const SRC = 'src/*.js';
const DEST = 'dist';
 
gulp.task('default', () =>
    gulp.src(SRC)
        .pipe(changed(DEST))
        // `ngAnnotate` will only get the files that 
        // changed since the last time it was run 
        .pipe(ngAnnotate())
        .pipe(gulp.dest(DEST))
);