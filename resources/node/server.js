require('dotenv').config(
	{
		path: '/var/www/html/managed/vuelaravelclean.com/dev-vuelaravelclean-com.mathisonprojects.dev/.env'
	}
);
var express = require('express'),
    http = require('http');
var app = express();
var server = http.createServer(app);
var port = process.env.NODE_PORT;
var io = require('socket.io').listen(server);
var fs = require('fs');

app.get('/', function(req, res) {
	res.writeHead(200, {'Content-Type': 'text/plain'});
	res.end('Node Server on ' + port + ".");
});


io.on('connection', function(socket){
	runConsole('A connection has been established.');

	socket.emit('init response');

	socket.on('connect', function(){
		runConsole('Connect to server');
		socket.emit('NodeResponse');
	});

});

server.listen(port, function(){
	runConsole('listening on *:'+port);
});

function runConsole(info) {
	console.log('-----------------------');
	console.log(info);
	console.log('-----------------------');
}