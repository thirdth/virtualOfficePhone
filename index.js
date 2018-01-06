var express = require('express');
var Promise = require('bluebird');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var bandwidth = require("node-bandwidth");
var xml = bandwidth.xml;
var tn;

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

//Checks the current Applications to see if we have one.
var configureApplication = function () {
	return Application.listAsync(client, {
		size: 1000
	})
	.then(function (applications) {
		var applicationId = searchForApplication(applications, appName);
		if(applicationId !== false) {
			return fetchTNByAppId(applicationId);
		}
		else {
			console.log("no app");
		}
	});
};

// Searches through application names and returns ID if matched
var searchForApplication = function (applications, name) {
	for (var i = 0; i < applications.length; i++) {
			if ( applications[i].name === name) {
				return applications[i].id;
			}
		}
	return false;
};

// Gets the first number associated with an application
var fetchTNByAppId = function (applicationId) {
	return PhoneNumber.listAsync(client, {
		applicationId: applicationId
	})
	.then(function (numbers) {
		tn = numbers[0].number;
	});
};

// Creates a new application then orders a number and assigns it to application
var newApplication =function () {
	var applicationId;
	return Application.createAsync(client, {
			name: appName,
			incomingCallUrl: "https://www.tel.tech4lawyers.com/incomingCall/",
			callbackHttpMethod: "get",
			autoAnswer: true
		})
		.then(function(application) {
			//search an available number
			applicationId = application.id;
			return AvailableNumber.searchLocalAsync(client, {
				areaCode: "415",
				quantity: 1
			});
		})
		.then(function(numbers) {
			// and reserve it
			tn = numbers[0].number;
			return PhoneNumber.createAsync(client, {
				number: tn,
				applicationId: applicationId
			});
		});
};

app.use(express.static('static'));
app.get('/', function(req, res){
	res.sendFile(__dirname + '/index.html');
});
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

configureApplication()
.then(function () {
	io.on('connection', function(socket){
		socket.emit('connected', 'Connected!');
	});

	http.listen(app.get('port'), function(){
		console.log('listening on *:' + app.get('port'));
	});
});
