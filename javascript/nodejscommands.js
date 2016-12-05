npm -v  //checks what version
npm init //creates package.json
npm install <module name> --save //installing a module and creates a dependency in package.json
npm install //reads package.json and installs all modules

//inside package.json dependency
 "devDependencies": {
    "concurrently": "^1.0.0", //when npm install is executed it automatically updates the module to it's minor updates
    "lite-server": "~1.3.4", //when npm install is executed it automatically install the module with  patch updates
    "typescript": "1.7.5" //when npm install is executed it just installed that module version
  }

//importing nodejs from your script
'use strict';
const qr = require('<modulename>');

"main": "./app/main.js" //points the main origin of the app 


//Creating a module
//mainapp
//mainapp/newmodule
//mainapp/newmodule.index.js
'use strict';
exports.hello = (user) =>{
    return "hello " + user
}

//mainapp/app.js
'use strict';
const enigma = require('./newmodule');
console.log(enighma.hello('john'));

//node app - to run the app.js