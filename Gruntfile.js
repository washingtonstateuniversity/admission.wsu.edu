module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                sourceMap: true
            },
            dev: {
                files: [
                    { src: "styles/sass/style.scss", dest: "style-sass.css" }
                ]
            }
        }

    });

    grunt.loadNpmTasks('grunt-sass');

    // Default task(s).
    grunt.registerTask('default', ['sass']);
};