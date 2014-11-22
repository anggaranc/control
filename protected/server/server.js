var mysql = require("mysql");
var time = require("moment");

var connection = mysql.createConnection({
	host	: "localhost",
	user	: "root",
	password: "",
	database: "home"
});

function dataGetRoomA(){
//	connection.connect();
	connection.query('SELECT * FROM tbl_room_a WHERE `id`=1;', function(err, rows, field){
		if(err) throw err;
		var array = [];
		array.push({
			"lampA1" : rows[0].lampA1, 
			"lampA2" : rows[0].lampA2, 
			"lampA1TimerStatus" : rows[0].lampA1TimerStatus,
                        "lampA1TimerStart" : rows[0].lampA1TimerStart,
                        "lampA1TimerStop" : rows[0].lampA1TimerStop,
                        "lampA2TimerStatus" : rows[0].lampA2TimerStatus,
                        "lampA2TimerStart" : rows[0].lampA2TimerStart,
                        "lampA2TimerStop" : rows[0].lampA2TImerStop
			});
//		console.log(array);
                timerRoomA(array);
		setTimeout(dataGetRoomA, 1000);
		
	});
//	connection.end();
}

function timerRoomA(data){
    var now = time();
    if(data[0]["lampA1TimerStatus"]==="on"){
        var lampA1TimerStart = time(data[0]["lampA1TimerStart"],"H:m:s");
        var lampA1TimerStop = time(data[0]["lampA1TimerStop"],"H:m:s");
        var lampA1 = data[0]["lampA1"];
        var totHour = lampA1TimerStop.hour()-lampA1TimerStart.hour();
        var totMinute = lampA1TimerStop.minute()-lampA1TimerStart.minute();
        if(totHour < 0){
            console.log("masuk if");
            if(now.hour() < lampA1TimerStart.hour() && now.hour() > lampA1TimerStop.hour()){
                console.log("masuk 1 off");
            }
            else if(now.hour() >= lampA1TimerStart.hour() && now.hour() >= lampA1TimerStop.hour()){
                if(now.hour() == lampA1TimerStart.hour()){
                    if(now.minute() >= lampA1TimerStart.minute()){
                        console.log("masuk 2 on");
                    }
                    else{
                        console.log("masuk 3 off");
                    }
                }
                else{
                    console.log("masuk 4 on");
                }
            }
            else if(now.hour() < lampA1TimerStart.hour() && now.hour() <= lampA1TimerStop.hour()){
                if(now.hour() == lampA1TimerStop.hour()){
                    if(now.minute() >= lampA1TimerStop.minute()){
                        console.log("off akhir 5");
                    }
                    else{
                        console.log("on 6");
                    }
                }
                else{
                    console.log("akhir 7 on");
                }
            }
            else{
                console.log("off");
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            console.log("masuk sama");
            if(now.hour()==lampA1TimerStart.hour() && now.hour()==lampA1TimerStop.hour()){
                if(now.minute() < lampA1TimerStart.minute() && now.minute() > lampA1TimerStop.minute()){
                    console.log("masuk off");
                }
                else if(now.minute() >= lampA1TimerStart.minute() && now.minute() > lampA1TimerStop.minute()){
                    console.log("masuk on");
                }
                else if(now.minute() < lampA1TimerStart.minute() && now.minute() < lampA1TimerStop.minute()){
                    console.log("masik on");
                }
                else{
                    console.log("masuk 3 off");
                }
            }
            else{
                console.log("data on");
            }
        }
        else{
            console.log("masuk else");
            if(now.hour() < lampA1TimerStart.hour()){
                if(lampA1 !== "off"){
                    console.log("1");
                    var post  = {'lampA1': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampA1TimerStart.hour() && now.hour() <= lampA1TimerStop.hour()){

                if(now.minute() >= lampA1TimerStart.minute() && now.minute() < lampA1TimerStop.minute()){
                    if(lampA1 !== "on"){
                        console.log("2");
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampA1TimerStart.minute()){
                    if(lampA1 !== "off"){
                        console.log("3");
                        var post  = {lampA1: 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampA1TimerStop.minute()){
                    if(lampA1 !== "off"){
                        console.log("4");
                        var post  = {lampA1: 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampA1TimerStop.hour()){
                if(lampA1 !== "off"){
                    console.log("5");
                    var post  = {lampA1: 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
            
    }
    
    if(data[0]["lampA2TimerStatus"]==="on"){
        var lampA2TimerStart = time(data[0]["lampA2TimerStart"],"H:m:s");
        var lampA2TimerStop = time(data[0]["lampA2TimerStop"],"H:m:s");
        var lampA2 = data[0]["lampA2"];
        
        if(now.hour() < lampA2TimerStart.hour()){
            if(lampA2 !== "off"){
                var post  = {'lampA2': 'off'};
                connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                });
            }
        }
        else if(now.hour() >= lampA2TimerStart.hour() && now.hour() <= lampA2TimerStop.hour()){
            
            if(now.minute() >= lampA2TimerStart.minute() && now.minute() < lampA2TimerStop.minute()){
                if(lampA2 !== "on"){
                    var post  = {lampA2: 'on'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.minute() < lampA2TimerStart.minute()){
                if(lampA2 !== "off"){
                    var post  = {lampA2: 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.minute() >= lampA2TimerStop.minute()){
                if(lampA2 !== "off"){
                    var post  = {lampA2: 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(now.hour() > lampA2TimerStop.hour()){
            if(lampA2 !== "off"){
                var post  = {lampA2: 'off'};
                connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                });
            }
        }
    }
    
}
console.log("Server node is running");
dataGetRoomA();