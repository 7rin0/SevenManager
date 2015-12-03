module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bowercopy: {
            options: {
                srcPrefix: 'web/assets/vendor',
                destPrefix: 'web/assets'
            },
            scripts: {
                files: {
                    'js/jquery.js': 'jquery/dist/jquery.js',
                    'js/bootstrap.js': 'bootstrap/dist/js/bootstrap.js'
                }
            },
            stylesheets: {
                files: {
                    'css/bootstrap.css': 'bootstrap/dist/css/bootstrap.css',
                    'css/font-awesome.css': 'Font-Awesome/css/font-awesome.css'
                }
            },
            fonts: {
                files: {
                    'fonts': 'Font-Awesome/fonts'
                }
            }
        },
        cssmin : {
            bootstrap:{
                src: 'web/assets/css/bootstrap.css',
                dest: 'web/assets/css/min/bootstrap.min.css'
            },
            "font-awesome":{
                src: 'web/assets/css/font-awesome.css',
                dest: 'web/assets/css/min/font-awesome.min.css'
            }
        },
        uglify : {
            js: {
                files: {
                    'web/assets/js/min/jquery.min.js': ['web/assets/js/jquery.js'],
                    'web/assets/js/min/bootstrap.min.js': ['web/assets/js/bootstrap.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['bowercopy', 'cssmin', 'uglify'])
};