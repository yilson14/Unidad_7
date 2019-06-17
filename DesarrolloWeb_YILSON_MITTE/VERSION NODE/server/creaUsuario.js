const mongoose = require('mongoose');
var User = require('./model/usuario.js');
var bcrypt = require('bcrypt');

mongoose.connect('mongodb://localhost/test', function() {
    var _user = new User({
        userId: 'test3',
        pass: bcrypt.hashSync('123', 10)
    })
    
    _user.save(function(err,user ){
        if (err) console.log(err);
    
        console.log('user', user);
    })
})

