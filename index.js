var express = require('express');
var Promise = require('bluebird');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var bandwidth = require("node-bandwidth");
var xml = bandwidth.xml;

var appName = "Reroute to Zack Cell";
var client = new bandwidth({
  userId    : "u-u53rntsssijiu5tp4e453li",  // note, this is not the same as the username you used to login to the portal
  apiToken  : "t-2yqgf62yrnwqkjio3wc72ba",
  apiSecret : "k5sih5b3m3evj6k46267cpzk7c3k7pipulimpfi"
});

app.use(express.static('static'));
app.post('/incomingCall', function(req, res) {
		client.Call.answer("callID").then(function () {});
});
