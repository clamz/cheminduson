module.exports = function(grunt) {

  // Project configuration.


  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    compass: {                  // Task
      dist: {                   // Target
        options: {              // Target options
          sassDir: 'src/CheminDuSon/SiteBundle/Resources/public/sass',
          cssDir: 'web/build/css',
          environment: 'production'
        }
      },
      dev: {                    // Another target
        options: {
          sassDir: 'src/CheminDuSon/SiteBundle/Resources/public/sass',
          cssDir: 'web/build/css',
          require: ['breakpoint', 'susy']
        }
      }
    },
    uglify: {
      dev: {
        options: {
          mangle: false,
          compress: false,
          beautify: true
        },
        files: [{
          expand: true,
          cwd: 'src/CheminDuSon/SiteBundle/Resources/public/js',
          src: '*.js',
          dest: 'web/build/js'
        }]
      },
      prod: {
        files: [{
          src: 'src/CheminDuSon/SiteBundle/Resources/public/js/*.js',
          dest: 'web/build/js/main.min.js'
        }]
      }
    },
    coffee: {
      compile_dev: {
        expand: true,
        flatten: true,
        src: ['src/CheminDuSon/SiteBundle/Resources/public/coffee/*.coffee'],
        dest: 'src/CheminDuSon/SiteBundle/Resources/public/js',
        ext: '.js'
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-contrib-compass');

  // Default task(s).
  grunt.registerTask('default', ['compass:dev','coffee:compile_dev', 'uglify']);

};