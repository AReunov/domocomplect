"use strict";

const browsersync = require("browser-sync").create();
const gulp = require("gulp");
const sass = require("gulp-sass");

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: "domo.local",
        port: 3000,
        notify: false,
        ui:false
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

// CSS task
function css() {
    return gulp
        .src("./scss/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("./css/"))
        .pipe(browsersync.stream());
}


// Watch files
function watchFiles() {
    gulp.watch("./scss/*.scss", css);
    gulp.watch("./templates/**/*", browserSyncReload);
}

const build = gulp.parallel(css);
const watch = gulp.parallel(watchFiles, browserSync);

// export tasks
exports.css = css;
exports.build = build;
exports.watch = watch;
exports.default = watch;