const mongoose = require('mongoose');
mongoose.connect('mongodb://<ipaddress>:27017/myapp'); // mongoose.connect('mongodb://username:password@host:port/database?options...');
mongoose.connection
    .once('open', () => console.log('good to go'))
    .on('error', (error) => {
        console.log('warning', error);
    });
// In separate file
const mongoose = require('<path>/mongoose');
const Schema = mongoose.Schema;
const UserSchema = new Schema({
    name: String
})

const User = mongoose.model('user', UserSchema);
module.exports = User;

// In separate file
const User = require('<path>/user');
const joe = new User({name: 'Joe'});