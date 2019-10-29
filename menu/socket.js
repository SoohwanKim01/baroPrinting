var http = require('http');
var fs = require('fs');
var socketio = require('socket.io');

var server = http.createServer(function(req, res){
    fs.readFile('index1.html', 'utf8', function(err, data){
        res.writeHead(200, {'Content-Type':'text/html'});
        res.end(data);
    });
}).listen(8888, function(){
    console.log('Running ~~~~~~~~~~~~');
});

var io = socketio.listen(server);
io.sockets.on('connection', function(socket){
    socket.on('sMsg', function(data){
        console.log(data);
        io.sockets.emit('rMsg', data);
    });
});