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

	socket.on('test', function() {
		console.log('hi');
	});

	socket.on('getHistorical', function(payload) {
		runConsole('Getting historical chat');
		var historicalChats = [
		{
				id: 'global',
				icon: 'fas fa-globe',
				count: 0,
				name: 'Global'
			},
			{
				id: 'self',
				icon: 'fas fa-sticky-note',
				count: 0,
				name: 'Self'
			}
		];
		// Rest obtained
		// Sort by last message
		socket.emit('setHistorical', historicalChats);
	});

	socket.on('getChat', function(payload) {
		runConsole('Getting historical chat');
		var chatLog = [];
		if (payload.id == 'global') {
			chatLog = require('./chat/global.json');
		}
		
		socket.emit('setChat', chatLog);
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