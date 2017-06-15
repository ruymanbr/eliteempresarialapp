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
        src: 'https://localhost',

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
/*
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


//var gulp = require('gulp');
var svgmin = require('gulp-svgmin');

gulp.task('default', function () {
    return gulp.src('logo.svg')
        .pipe(svgmin())
        .pipe(gulp.dest('./out'));
});


//var gulp = require('gulp');
var postcss = require('gulp-postcss');

gulp.task('css', function () {
    var processors = [
        //Aqui irán los plugins que vayamos instalando
    ];
    //Aquí la ruta de donde coge nuestros css
    return gulp.src('./src/css/styles.css')
        .pipe(postcss(processors))
        //Aqui la ruta de destino
        .pipe(gulp.dest('./dist/css'));
});

//var gulp = require('gulp');
var postcss = require('gulp-postcss');
var autoprefixer = require('gulp-autoprefixer');
var vars = require('postcss-simple-vars');
var nested = require('postcss-nested');
var rucksack = require('gulp-rucksack');
var pxtorem = require('postcss-pxtorem');

gulp.task('css', function() {
    var processors = [
        vars,
        nested,
        rucksack,
        pxtorem({
            root_value: 16,
            unit_precision: 2,
            prop_white_list: ['font-size', 'line-height', 'padding'],
            replace: true,
            media_query: false
        }),
        autoprefixer({
            browsers: ['last 2 version']
        })
    ];
    //Aquí la ruta de donde coge nuestros css
    return gulp.src('./src/css/styles.css')
        .pipe(rucksack())
        .pipe(postcss(processors))
        //Aqui la ruta de destino
        .pipe(gulp.dest('./dist/css'));
});


return gulp.src('./src/css/styles.css')
    .pipe(rucksack())
    .pipe(sourcemaps.init())
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css'));



var cleanCSS = require('gulp-clean-css');

gulp.task('minify-css', function() {
    return gulp.src('styles/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});

var uglify = require('gulp-uglify');
var pump = require('pump');

gulp.task('compress', function (cb) {
  pump([
        gulp.src('lib/*.js'),
        uglify(),
        gulp.dest('dist')
    ],
    cb
  );
});


var request = require('request');
var path = require( 'path' );
var criticalcss = require("criticalcss");
var fs = require('fs');
var tmpDir = require('os').tmpdir();

var cssUrl = 'http://site.com/style.css';
var cssPath = path.join( tmpDir, 'style.css' );
request(cssUrl).pipe(fs.createWriteStream(cssPath)).on('close', function() {
  criticalcss.getRules(cssPath, function(err, output) {
    if (err) {
      throw new Error(err);
    } else {
      criticalcss.findCritical("https://site.com/", { rules: JSON.parse(output) }, function(err, output) {
        if (err) {
          throw new Error(err);
        } else {
          console.log(output);
        }
      });
    }
  });
});*/