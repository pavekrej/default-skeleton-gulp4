/*

--- GULPFILE ---

 */

/*
---------------------------------------- PACKAGES ----------------------------------------
 */

// Packages
var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var del = require('del');

var sass = require('gulp-sass');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var cleanCss = require('gulp-clean-css');
var concatCss = require('gulp-concat-css');
var lineEndingCorrector = require('gulp-line-ending-corrector');

var imageMinification = require('gulp-imagemin');
var changed = require('gulp-changed');

var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var uglify = require('gulp-uglify');

var prettier = require('gulp-prettier');
var stylelint = require('gulp-stylelint');

/*
---------------------------------------- PATHS AND CONFIGURATION ----------------------------------------
 */

// Browser synchronization settings
var host = 'default-skeleton-gulp4';
var port = 81;

// Paths
var buildTarget = 'build';
var paths = {
    php: {
        targetWatch: '**/*.php'
    },
    css: {
        source: 'components/components.scss',
        targetWatch: ['components/components.scss', 'components/**/*.scss'],
        targetDevelop: buildTarget + '/develop/css',
        targetProduction: buildTarget + '/production/css',
        name: 'style'
    },
    js: {
        source: 'components.js',
        folder: 'components/',
        targetWatch: ['components/components.js', 'components/**/*.js'],
        targetDevelop: buildTarget + '/develop/js',
        targetProduction: buildTarget + '/production/js',
        name: 'script'
    },
    images: {
        source: 'components/**/images/**/*.*',
        targetDevelop: 'build/develop/images',
        targetProduction: 'build/production/images'
    },
    vendors: {
        sourceStyle: 'vendors/vendors.css',
        sourceScript: 'vendors.js',
        folder: 'vendors/',
        assets: 'vendors/**/**/*.{gif,jpg,png,svg}',
        targetDevelop: buildTarget + '/develop/vendors',
        targetProduction: buildTarget + '/production/vendors',
        nameStyle: 'style',
        nameScript: 'script'
    }
};

// Autoprefixer
var prefixVersion = 'last 2 versions';

// Prettier
var prettierCSS,
    prettierJS = {
        printWidth: 120,
        tabWidth: 4,
        useTabs: false,
        semi: true,
        singleQuote: true,
        trailingComma: 'all',
        bracketSpacing: false,
    };


/*
---------------------------------------- DEVELOP SOURCES ----------------------------------------
 */

/* --------------- CSS --------------- */

// Develop CSS
function developCSS() {
    return gulp
        .src(paths.css.source)
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(
            sass({
                outputStyle: 'expanded',
            }).on('error', sass.logError),
        )
        .pipe(autoprefixer(prefixVersion))
        .pipe(sourcemaps.write())
        .pipe(lineEndingCorrector())
        .pipe(prettier(prettierCSS))
        .pipe(rename({basename: paths.css.name}))
        .pipe(gulp.dest(paths.css.targetDevelop));
}

/* --------------- JS --------------- */

// Develop JS
async function developJS() {
    var jsFiles = [paths.js.source];
    jsFiles.map(function (entry) {
        return browserify({
            entries: [paths.js.folder + entry]
        })
            .transform(babelify, { presets: ['env'] })
            .bundle()
            .pipe( source(entry))
            .pipe(rename({ basename: paths.js.name}))
            .pipe(buffer())
            .pipe(sourcemaps.init({ loadMaps: true }))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest(paths.js.targetDevelop))
    });
}

/* --------------- Images --------------- */

// Develop images
function developImages() {
    return gulp
        .src(paths.images.source)
        .pipe(rename(function(path){
            var pathDirnameDefault = path.dirname;
            var pathDirname = pathDirnameDefault.replace('\\images', '');
            path.dirname = pathDirname;
        }))
        .pipe(changed(paths.images.targetDevelop))
        .pipe(
            imageMinification([
                imageMinification.jpegtran({progressive: true}),
                imageMinification.optipng({optimizationLevel: 5}),
                imageMinification.svgo({
                    plugins: [{removeViewBox: true}, {cleanupIDs: true}],
                }),
            ]),
        )
        .pipe(gulp.dest(paths.images.targetDevelop));
}

// Delete develop images
function deleteDevelopImages() {
    return del(paths.images.targetDevelop);
}

/* --------------- Vendors --------------- */

// Develop vendors assets
function developVendorsAssets() {
    return gulp
        .src(paths.vendors.assets)
        .pipe(
            imageMinification([
                imageMinification.jpegtran({progressive: true}),
                imageMinification.optipng({optimizationLevel: 5}),
                imageMinification.svgo({
                    plugins: [{removeViewBox: true}, {cleanupIDs: true}],
                }),
            ]),
        )
        .pipe(gulp.dest(paths.vendors.targetDevelop));
}

// Develop vendors CSS
function developVendorsCSS() {
    return gulp
        .src(paths.vendors.sourceStyle)
        .pipe(concatCss(paths.vendors.nameStyle + '.css'))
        .pipe(lineEndingCorrector())
        .pipe(rename({basename: paths.vendors.nameStyle}))
        .pipe(gulp.dest(paths.vendors.targetDevelop))
}

// Develop vendors JS
async function developVendorsJS() {
    var jsFiles = [paths.vendors.sourceScript];
    jsFiles.map(function (entry) {
        return browserify({
            entries: [paths.vendors.folder + entry]
        })
            .transform(babelify, { presets: ['env'] })
            .bundle()
            .pipe( source(entry))
            .pipe(rename({ basename: paths.vendors.nameScript}))
            .pipe(buffer())
            .pipe(sourcemaps.init({ loadMaps: true }))
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest(paths.vendors.targetDevelop))
    });
}

// Delete develop vendors
function deleteDevelopVendors() {
    return del(paths.vendors.targetDevelop);
}


/*
---------------------------------------- PRODUCTION SOURCES ----------------------------------------
 */

/* --------------- CSS --------------- */

// Production CSS
function productionCSS() {
    return gulp
        .src(paths.css.source)
        .pipe(
            sass({
                outputStyle: 'compressed',
            }).on('error', sass.logError),
        )
        .pipe(autoprefixer(prefixVersion))
        .pipe(cleanCss())
        .pipe(lineEndingCorrector())
        .pipe(rename({basename: paths.css.name, suffix: '.min'}))
        .pipe(gulp.dest(paths.css.targetProduction));
}

/* --------------- JS --------------- */

// Production JS
async function productionJS() {
    var jsFiles = [paths.js.source];
    jsFiles.map(function (entry) {
        return browserify({
            entries: [paths.js.folder + entry]
        })
            .transform(babelify, { presets: ['env'] })
            .bundle()
            .pipe( source(entry))
            .pipe(rename({ basename: paths.js.name, suffix: '.min'}))
            .pipe(buffer())
            .pipe(uglify())
            .pipe(gulp.dest(paths.js.targetProduction))
    });
}

/* --------------- Images --------------- */

// Production images
function productionImages() {
    return gulp
        .src(paths.images.source)
        .pipe(rename(function(path){
            var pathDirnameDefault = path.dirname;
            var pathDirname = pathDirnameDefault.replace('\\images', '');
            path.dirname = pathDirname;
        }))
        .pipe(changed(paths.images.targetProduction))
        .pipe(
            imageMinification([
                imageMinification.jpegtran({progressive: true}),
                imageMinification.optipng({optimizationLevel: 5}),
                imageMinification.svgo({
                    plugins: [{removeViewBox: true}, {cleanupIDs: true}],
                }),
            ]),
        )
        .pipe(gulp.dest(paths.images.targetProduction));
}

// Delete develop images
function deleteProductionImages() {
    return del(paths.images.targetProduction);
}

/* --------------- Vendors --------------- */

// Production vendors assets
function productionVendorsAssets() {
    return gulp
        .src(paths.vendors.assets)
        .pipe(
            imageMinification([
                imageMinification.jpegtran({progressive: true}),
                imageMinification.optipng({optimizationLevel: 5}),
                imageMinification.svgo({
                    plugins: [{removeViewBox: true}, {cleanupIDs: true}],
                }),
            ]),
        )
        .pipe(gulp.dest(paths.vendors.targetProduction));
}

// Production vendors
function productionVendorsCSS() {
    return gulp
        .src(paths.vendors.sourceStyle)
        .pipe(concatCss(paths.vendors.nameStyle + '.min.css'))
        .pipe(cleanCss())
        .pipe(lineEndingCorrector())
        .pipe(rename({basename: paths.vendors.nameStyle + '.min'}))
        .pipe(gulp.dest(paths.vendors.targetProduction))
}

// Production vendors JS
async function productionVendorsJS() {
    var jsFiles = [paths.vendors.sourceScript];
    jsFiles.map(function (entry) {
        return browserify({
            entries: [paths.vendors.folder + entry]
        })
            .transform(babelify, { presets: ['env'] })
            .bundle()
            .pipe( source(entry))
            .pipe(rename({ basename: paths.vendors.nameScript, suffix: '.min'}))
            .pipe(buffer())
            .pipe(uglify())
            .pipe(gulp.dest(paths.vendors.targetProduction))
    });
}

// Delete production vendors
function deleteProductionVendors() {
    return del(paths.vendors.targetProduction);
}


/*
---------------------------------------- CODE QUALITY ----------------------------------------
 */

// Stylelint CSS (check and fix)
function stylelintCSS() {
    // Stylelint automatically load configuration from .stylelintrc
    return gulp
        .src(paths.css.targetWatch)
        .pipe(stylelint({
            fix: true,
            reporters: [{formatter: 'string', console: true}]
        }))
        .pipe(gulp.dest(file => file.base));
}

// Prettify CSS
function prettifyCSS() {
    return gulp
        .src(paths.css.targetWatch)
        .pipe(prettier(prettierCSS))
        .pipe(gulp.dest(file => file.base));
}

// Prettify JS
function prettifyJS() {
    return gulp
        .src(paths.js.targetWatch)
        .pipe(prettier(prettierJS))
        .pipe(gulp.dest(file => file.base));
}


/*
---------------------------------------- OTHERS ----------------------------------------
 */

// Clean build sources
function deleteBuild() {
    return del(buildTarget);
}


/*
---------------------------------------- WATCH ----------------------------------------
 */

function watch() {
    browserSync.init({
        proxy: 'http://' + host + ':' + port + '/',
        host: host,
        open: 'external'
    });
    gulp.watch(paths.css.targetWatch, {usePolling: true}, gulp.series(developCSS));
    gulp.watch(paths.js.targetWatch, {usePolling: true}, gulp.series(developJS));
    gulp.watch([paths.php.targetWatch, paths.css.targetDevelop, paths.css.targetProduction, paths.js.targetDevelop, paths.js.targetProduction], {usePolling: true}).on(
        'change',
        browserSync.reload,
    );
}


/*
---------------------------------------- TASKS ----------------------------------------
 */

var developBuild = gulp.parallel(watch);
gulp.task('WATCH', developBuild);

gulp.task('build:DEVELOP:IMAGES', developImages);
gulp.task('build:DEVELOP:VENDORS', gulp.series(deleteDevelopVendors, developVendorsAssets, developVendorsCSS, developVendorsJS));

gulp.task('delete:develop:images', deleteDevelopImages);
gulp.task('delete:build', deleteBuild);

gulp.task('prettify:develop:css-js', gulp.parallel(prettifyCSS, prettifyJS));
gulp.task('stylelint:develop:css', stylelintCSS);
gulp.task('!build:DEVELOP', gulp.parallel(gulp.series(deleteDevelopImages, developCSS, developJS, developImages), gulp.series(deleteDevelopVendors, developVendorsAssets, developVendorsCSS, developVendorsJS)));
gulp.task('!!build:PRODUCTION', gulp.parallel(gulp.series(deleteProductionImages, productionCSS, productionJS, productionImages), gulp.series(deleteProductionVendors, productionVendorsAssets, productionVendorsCSS, productionVendorsJS)));
