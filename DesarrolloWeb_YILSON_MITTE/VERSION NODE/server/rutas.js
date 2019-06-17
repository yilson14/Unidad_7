const Router = require('express').Router();
const bcrypt = require('bcrypt');
var User = require('./model/usuario.js');

Router.post('/authenticate', async function(req, res, next) {
    const userId = req.body.userId
    const pass = req.body.pass
try {
    const user = await User.findOne({ userId });
    if (user && bcrypt.compareSync(pass, user.pass)) {             
        return res.status(200).send({ message: 'Validado'})
    }  else {
        return res.status(400).send({ message: 'Access denied'});
    }
} catch (err) {
    return res.status(500).send({ message: err.message });
}
    
})

Router.get('all', function(req, res) {

})

Router.get('/:id', function(req, res) {

})

module.exports = Router