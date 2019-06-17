const http = require('http'),
    path = require('path'),
    Routing = require('./rutas.js'),
    eventRouting = require('./eventRutas.js'),
    express = require('express'),
    bodyParser = require('body-parser'),
    mongoose = require('mongoose');

const PORT = 8082
const app = express();

const Server = http.createServer(app);

app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())
app.use(express.static('client'))

app.use('/users', Routing);
app.use('/events', eventRouting);

Server.listen(PORT, function() {
    mongoose.connect('mongodb://localhost/test', function(err) {
        if (err) console.log('Error connecting database', err);

        console.log('Database connected!');
    });
    console.log('Server is listening on port: ' + PORT);
})

