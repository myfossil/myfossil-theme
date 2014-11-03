// Project configuration
var project   = 'myfossil';

// Initialization sequence
var gulp      = require('gulp')
  , gutil     = require('gulp-util')
  , plugins   = require('gulp-load-plugins')({ camelize: true })
  , lr        = require('tiny-lr')
  , server    = lr()
  , sass      = require('gulp-sass')
  , build     = './static/'
;

gulp.task('styles', function() {
  return gulp.src(['assets/src/scss/style.scss', 'assets/src/scss/style-login.scss'])
      .pipe(sass())
      .pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
      .pipe(gulp.dest('assets/staging'))
      //.pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
      .pipe(gulp.dest(build + 'css/'))
      .pipe(plugins.livereload(server));
});

gulp.task('fonts', function() {
  return gulp.src(['assets/src/fonts/*'])
      .pipe(gulp.dest(build + 'fonts/'))
      .pipe(plugins.livereload(server));
});

gulp.task('styles-css', function() {
  return gulp.src(['assets/src/css/*.css'])
      .pipe(gulp.dest('assets/staging'))
      //.pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
      .pipe(plugins.rename({ suffix: '.min' }))
      .pipe(gulp.dest(build + 'css/'))
      .pipe(plugins.livereload(server));
});

gulp.task('plugins', function() {
  return gulp.src(['assets/src/js/plugins/*.js', 'assets/src/js/plugins.js'])
      .pipe(plugins.concat(project+'-plugins.js'))
      .pipe(gulp.dest('assets/staging'))
      .pipe(plugins.rename({ suffix: '.min' }))
      .pipe(plugins.uglify())
      .pipe(plugins.livereload(server))
      .pipe(gulp.dest(build));
});

gulp.task('scripts', function() {
  return gulp.src(['assets/src/js/*.js', '!assets/src/js/plugins.js'])
      .pipe(plugins.jshint('.jshintrc'))
      .pipe(plugins.jshint.reporter('default'))
      //.pipe(plugins.concat(project+'.js'))
      .pipe(gulp.dest('assets/staging'))
      .pipe(plugins.rename({ suffix: '.min' }))
      .pipe(plugins.uglify())
      .pipe(plugins.livereload(server))
      .pipe(gulp.dest(build + '/js/'));
});

gulp.task('images', function() {
  return gulp.src('assets/src/img/**/*')
      .pipe(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
      .pipe(plugins.livereload(server))
      .pipe(gulp.dest(build+'img/'));
});

gulp.task('clean', function() {
  return gulp.src(build+'**/.DS_Store', { read: false })
      .pipe(plugins.clean());
});

gulp.task('bower_components', function() { // Executed on bower update
  return gulp.src(['assets/bower_components/normalize.css/normalize.css'])
      .pipe(plugins.rename('_base_normalize.scss'))
      .pipe(gulp.dest('assets/src/scss'));
});

gulp.task('watch', function() {
  server.listen(35729, function (err) { // Listen on port 35729
    if (err) {
      return console.log(err)
    };
    gulp.watch('assets/src/scss/**/*.scss', ['styles']);
    gulp.watch('assets/src/css/**/*.css', ['styles-css']);
    gulp.watch('assets/src/js/**/*.js', ['plugins', 'scripts']);
    gulp.watch('assets/src/img/**/*', ['images']);
    gulp.watch('./**/*.php').on('change', function(file) { plugins.livereload(server).changed(file.path); });
  });
});

gulp.task('build', ['fonts', 'styles', 'styles-css', 'plugins', 'scripts', 'images', 'clean']);
gulp.task('default', ['build', 'watch']);
