const gulp = require('gulp');

// Sass/CSS processes
const bourbon = require('bourbon').includePaths;
const neat = require('bourbon-neat').includePaths;
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cssMinify = require('cssnano');
const sassLint = require('gulp-sass-lint');

// Utilities
const livereload = require('gulp-livereload');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const plumber = require('gulp-plumber');

/** ***********
 * Utilities
 *********** */

/**
 * Error handling
 *
 * @function
 */
function handleErrors() {
    const args = Array.prototype.slice.call(arguments);

    notify
        .onError({
            title: 'Task Failed [<%= error.message %>',
            message: 'See console.',
            sound: 'Sosumi', // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
        })
        .apply(this, args);

    gutil.beep(); // Beep 'sosumi' again

    // Prevent the 'watch' task from stopping
    this.emit('end');
}

/** ***********
 * CSS Tasks
 *********** */

/**
 * PostCSS Task Handler
 */
gulp.task('postcss', function() {
    return (
        gulp
        .src('sass/style.scss')

        // Error handling
        .pipe(
            plumber({
                errorHandler: handleErrors,
            })
        )

        // Wrap tasks in a sourcemap
        .pipe(sourcemaps.init())

        .pipe(
            sass({
                includePaths: [].concat(bourbon, neat),
                errLogToConsole: true,
                outputStyle: 'expanded', // Options: nested, expanded, compact, compressed
            })
        )
        // livereload
        .pipe(livereload())
        .pipe(postcss([autoprefixer()]))
        // creates the sourcemap
        .pipe(sourcemaps.write())

        .pipe(gulp.dest('./'))
    );
});

gulp.task('css:minify', gulp.series('postcss'), function() {
    return (
        gulp
        .src('style.css')
        // Error handling
        .pipe(
            plumber({
                errorHandler: handleErrors,
            })
        )

        .pipe(
            cssMinify({
                safe: true,
            })
        )
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('./'))
        .pipe(
            notify({
                message: 'Styles are built.',
            })
        )
    );
});

gulp.task('sass:lint', gulp.series('css:minify'), function() {
    gulp.src(['sass/style.scss', '!sass/base/html5-reset/_normalize.scss', '!sass/utilities/animate/**/*.*'])
        .pipe(sassLint())
        .pipe(sassLint.format())
        .pipe(sassLint.failOnError());
});

/** ******************
 * All Tasks Listeners
 ****************** */

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('sass/**/*.scss', gulp.series('styles'));
});

/**
 * Individual tasks.
 */
// gulp.task('scripts', [''])
gulp.task('styles', gulp.series('sass:lint'));