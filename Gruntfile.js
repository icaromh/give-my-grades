module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    less: {
      dist: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'style.css.map',
          sourceMapFilename: 'assets/css/style.css.map'
        },
        files: {
          'assets/css/style.css': 'src/css/style.less'
        }
      },
    },

    cssmin: {
      dev : {
        options : {
          banner: '/*# sourceMappingURL=<%= less.dist.options.sourceMapURL %> */ @import "bootstrap.min.css"; ',
          keepSpecialComments : '*'
        },
        files: {
          'assets/css/style.css': 'assets/css/style.css'
        }
      },
    },

    watch: {
      less: {
        files: 'src/css/*.less',
        tasks: ['less:dist', 'cssmin:dev']
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['less', 'cssmin']);
  // grunt.registerTask('watch', ['watch']);

};