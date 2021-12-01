var gulp = require('gulp'), 
	sass = require('gulp-sass')(require('sass')), 
	browserSync = require('browser-sync'),
	concat      = require('gulp-concat'), 
	cssnano     = require('gulp-cssnano'), 
	rename      = require('gulp-rename'),
	uglify      = require('gulp-uglify'),
	del         = require('del'), 
	imagemin    = require('gulp-imagemin'), 
	pngquant    = require('imagemin-pngquant'), 
	cache       = require('gulp-cache'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function(){ 
	return gulp.src('src/sass/**/*.sass') 
		.pipe(sass()) 
		.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) 
		.pipe(gulp.dest('src/css')) 
		.pipe(browserSync.reload({stream: true})) 
});

gulp.task('browser-sync', function() { 
	browserSync({ 
		proxy: "beetroot.loc",
		notify: false
	});
});

gulp.task('css-libs', function() {
	return gulp.src('src/sass/**/*.sass') 
		.pipe(sass()) 
		.pipe(cssnano()) 
		.pipe(rename({suffix: '.min'})) 
		.pipe(gulp.dest('src/css')); 
});

gulp.task('scripts', function() {
	return gulp.src('src/js/**/*.js')
	.pipe(browserSync.reload({ stream: true }))
});

gulp.task('scripts-build', function() {
	return gulp.src('src/js/**/*.js')
		.pipe(uglify())
		.pipe(rename({suffix: '.min'})) 
		.pipe(gulp.dest('dist/js')); 
});

gulp.task('code', function() {
	return gulp.src('*.php')
	.pipe(browserSync.reload({ stream: true }))
});

gulp.task('clean', async function() {
	return del.sync('dist');
});

gulp.task('img', function() {
	return gulp.src('src/images/**/*') 
		.pipe(cache(imagemin({
			interlaced: true,
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		})))
		.pipe(gulp.dest('dist/images')); 
});

gulp.task('prebuild', async function() {
 
	var buildCss = gulp.src([ 
		'src/css/main.min.css'
		])
	.pipe(gulp.dest('dist/css'))
 
});

gulp.task('clear', function () {
	return cache.clearAll();
})

gulp.task('watch', function() {
	gulp.watch('src/sass/**/*.sass', gulp.parallel('sass'));
	gulp.watch('src/sass/**/*.sass', gulp.parallel('css-libs'));
	gulp.watch('*.php', gulp.parallel('code')); 
	gulp.watch('src/js/**/*.js', gulp.parallel('scripts')); 
});

gulp.task('default', gulp.parallel('css-libs','sass', 'browser-sync', 'watch'));
gulp.task('build', gulp.parallel('prebuild','clean', 'img', 'sass', 'scripts-build'));