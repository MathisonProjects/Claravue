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
			chatLog = require(__dirname + '/chat/global.json');
		} else if (payload.id == 'self') {
			var fileName = getSelfName(payload.user);
			checkFileExist(fileName);
			setTimeout(() => {
				chatLog = require(getSelfName(payload.user));
			}, 50);
		}
		
		socket.emit('setChat', chatLog);
	});

	socket.on('sendChat', function(payload) {
		var fileName = null;
		if (payload.id == 'global') {
			fileName = __dirname + '/chat/global.json';
		} else if (payload.id == 'self') {
			fileName = getSelfName(payload.message.senderId);
		}
		chatLog = require(fileName);
		chatLog.push(payload.message);
		writeToFileJson(fileName, chatLog);
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

function checkFileExist(fileName) {
	fs.exists(fileName, function(exists){
		if (!exists) {
			writeToFileJson(fileName, []);
		}
	});
}

function getSelfName(id) {
	return __dirname + '/chat/self.' + id + '.json';
}

function getChatName(convo) {
	return __dirname + '/chat/chat.' + convo + '.json';
}

function writeToFileJson(name, obj) {
	var json = JSON.stringify(obj);
	writeToFile(name, json);
}

function writeToFile(name, content) {
	fs.writeFile(name, content, {flag: 'w'}, function(err) {
		if (err) throw err;
    	runConsole("It's saved!");
	});
}