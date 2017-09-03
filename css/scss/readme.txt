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
sass --watch sassfolder/sass:outputfolder/stylesheets
Press Ctrl-C to stop