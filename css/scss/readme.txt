SCSS                            SASS
- curly braces & semi-colons    - indentation
- ignores whitespace            - strict rules for whitespace
- @mixin my-mixin               - =my-mixin
- @include my-mixin             - +my-mixin
- @import foo                   - @import foo(same)
- @extend foo                   - @extend foo(same)

.container {                    .container 
    float: left;                    float: left;
    width: 100%;                    width: 100%;
p {                                 p
        color: #333;                    color: #333; 
    }
}


//Installing SCSS
http://sass-lang.com/install
sudo gem install sass
sass --watch sass/main.scss:css/main.css
Press Ctrl-C to stop

/* Not working below*/
Grunt Task Runner
$ npm install -g grunt-cli
    - If you get an error  -  sudo chown -R $USER /usr/local
$ npm init
$ npm install grunt --save-dev
$ npm install grunt-sass --save-dev
Create a Gruntfile.js

module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
      options: {
        outputStyle: 'expanded'
      },
      dist:{
          files:[{
              expand: true, 
              cwd: '<folderlocofscss>',
              src: '**/*.scss',
              destination: '<folderlocofcss>',
              ext: '.css'
          }]
      }
    },
    watch: {
      files: ['<%= jshint.files %>'],
      tasks: ['jshint']
    }
  });

  grunt.loadNpmTasks('grunt-sass');

};


Cre
Installing SASS using visual studio code

