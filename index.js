var express = require('express');
var Promise = require('bluebird');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var bandwidth = require("node-bandwidth");
var xml = bandwidth.xml;
var tn = "16152084943";

var appName = "Reroute to Zack Cell";
var client = new bandwidth({
  userId    : "u-u53rntsssijiu5tp4e453li",  // note, this is not the same as the username you used to login to the portal
  apiToken  : "t-2yqgf62yrnwqkjio3wc72ba",
  apiSecret : "k5sih5b3m3evj6k46267cpzk7c3k7pipulimpfi"
});

/// Start the XML response
var response = new xml.Response();
// Create the sentence
var speakSentence = new xml.SpeakSentence({sentence: "Thank you for calling the law office of Zack Glaser, please wait while we connect you.", voice: "julie", gender: "female", locale: "en_US"});
//Push all the XML to the response
response.push(speakSentence);
// Create the xml to send
var bxml = response.toXml();

app.use(express.static('static'));
app.get('/incomingCall', function(req, res) {
	if(req.query && req.query.eventType && req.query.eventType === 'answer') {
		res.send(bxml);
	}
	else if(req.query && req.query.eventType && req.query.eventType === 'hangup'){
		res.send({status: 200});
	}
	else {
		res.send({status: 200});
	}
});
