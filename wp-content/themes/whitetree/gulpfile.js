var gulp = require('gulp');
var sass = require('gulp-sass');
var pump = require('pump');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('styles', (done) =>
{
	gulp.src("assets/sass/style.scss")
	.pipe(sourcemaps.init())
	.pipe(sass(
	{
		outputStyle: 'compressed'
	}).on('error', sass.logError))
	.pipe(autoprefixer(
	{
		browsers: ['last 4 versions'],
		cascade: false
	}))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('public/css'))
	.pipe(notify(
	{
		message: 'Styles task complete'
	}));

	done();
});

gulp.task('compress', function(cb)
{
	pump(
	[
		gulp.src('assets/js/*.js'),
		uglify(),
		gulp.dest('public/js')
	],cb)
	.pipe(notify(
	{
		message: 'Compress task complete'
	}));
});

gulp.task('default', gulp.parallel('styles', 'compress'));

gulp.task('watch', function()
{
	gulp.watch("assets/sass/*.scss", gulp.series('styles'));
	gulp.watch("assets/js/*.js", gulp.series('compress'));
});