module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bowercopy: {
            options: {
                srcPrefix: 'web/assets/vendor',
                destPrefix: 'web/assets/vendor/min'
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
        }
    });

    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.registerTask('default', ['bowercopy']);
};