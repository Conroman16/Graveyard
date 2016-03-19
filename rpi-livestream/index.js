// Set defaults
var defaults = {
	http_port: 1693,
	work_dir: '/stream',
	views_dir: 'views',
	layouts_dir: 'views/layouts',
	layout_view: 'layout',
	index_view: 'index',
	mjpeg_name: 'image_stream.jpg',
	stream_url: 'stream',
	run_time: 0,
	tl_interval: 1000,
	image: {
		width: 1280,
		height: 720
	},
	date_format: 'DD-MM-YYYY HH:mm:ss'
};

// Initialize
var express = require('express');
var exphbs = require('express-handlebars');
var server = express();
var http = require('http').Server(server);
var io = require('socket.io')(http);
var fs = require('fs');
var path = require('path');
var moment = require('moment');
var spawn = require('child_process').spawn;
var proc;

server.engine('.hbs', exphbs({extname:'.hbs', defaultLayout: defaults.layout_view}));
server.set('views', path.resolve('views'));
server.set('layouts', path.resolve(defaults.layouts_dir))
server.set('view engine', 'handlebars');
server.use('/js', express.static(path.join(__dirname + path.resolve('js'))));

// Default route
server.get('/', function(req, res) {
	res.render('index.hbs');
});

server.get('/' + defaults.stream_url, function(req, res){
	res.sendFile(path.join(defaults.work_dir, defaults.mjpeg_name));
});

server.get('/js/*', function(req, res){
	res.sendFile(path.join(__dirname, req.originalUrl));
});

// Container for active sessions
var sockets = {};

io.on('connection', function(socket) {
	sockets[socket.id] = socket;
	log('Client connected.  Total connections: ' + Object.keys(sockets).length);

	socket.on('disconnect', function() {
		delete sockets[socket.id];
		log('Client disconnected.  Total connections: ' + Object.keys(sockets).length);

		// No more sockets, kill the stream
		if (Object.keys(sockets).length == 0) {
			server.set('watchingFile', false);
			if (proc)
				proc.kill();
			fs.unwatchFile(path.join(defaults.work_dir, defaults.mjpeg_name));
			log('Stopped watching for changes');
		}
	});

	socket.on('start-stream', function() {
		startStreaming(io);
	});
});

// Start http server
http.listen(defaults.http_port, function() {
	log('Listening on *:' + defaults.http_port);
});


// Functions
function log(str){
	return console.log('[' + moment().format(defaults.date_format) + '] ' + str);
}
function emitStream(){
	io.sockets.emit('liveStream', '/' + defaults.stream_url + '?_t=' + (Math.random() * 100000));
}
function stopStreaming() {
	if (Object.keys(sockets).length == 0) {
		server.set('watchingFile', false);
		if (proc)
			proc.kill();
		fs.unwatchFile(path.join(defaults.work_dir, defaults.mjpeg_name));
	}
}
function startStreaming(io) {
	if (server.get('watchingFile')) {
		emitStream();
		return;
	}
	else{
		io.sockets.emit('loadingStream');
	}

	// Declare arguments
	var args = [
		"-w", defaults.image.width,
		"-h", defaults.image.height,
		"-o", path.join(defaults.work_dir, defaults.mjpeg_name),
		"-t", defaults.run_time, 
		"-tl", defaults.tl_interval,
		"-n"  // No image preview generation
	];

	// Spawn 'raspistill' process
	proc = spawn('raspistill', args);

	log('Watching for changes...');

	server.set('watchingFile', true);

	fs.watchFile(path.join(defaults.work_dir, defaults.mjpeg_name), function(current, previous) {
		emitStream();
		log('Image updated');
	});
}
