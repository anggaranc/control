var mysql = require("mysql");
var time = require("moment");

var connection = mysql.createConnection({
	host	: "localhost",
	user	: "root",
	password: "",
	database: "home"
});

function dataGetRoomA(){

	connection.query('SELECT * FROM tbl_room_a WHERE `id`=1;', function(err, rows, field){
		if(err) {
			connection.end();
			console.error(err);
			return;
		}
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
      timerRoomA(array);
		setTimeout(dataGetRoomA, 1000);

	});
}
function dataGetRoomB(){
//	connection.connect();
	connection.query('SELECT * FROM tbl_room_b WHERE `id`=1;', function(err, rows, field){
		if(err) throw err;
		var array = [];
		array.push({
			"lampB1" : rows[0].lampB1,
			"lampB2" : rows[0].lampB2,
			"lampB1TimerStatus" : rows[0].lampB1TimerStatus,
                        "lampB1TimerStart" : rows[0].lampB1TimerStart,
                        "lampB1TimerStop" : rows[0].lampB1TimerStop,
                        "lampB2TimerStatus" : rows[0].lampB2TimerStatus,
                        "lampB2TimerStart" : rows[0].lampB2TimerStart,
                        "lampB2TimerStop" : rows[0].lampB2TImerStop
			});
//		console.log(array);
                timerRoomB(array);
		setTimeout(dataGetRoomB, 1000);

	});
//	connection.end();
}
function dataGetRoomC(){
//	connection.connect();
	connection.query('SELECT * FROM tbl_room_c WHERE `id`=1;', function(err, rows, field){
		if(err) throw err;
		var array = [];
		array.push({
			"lampC1" : rows[0].lampC1,
			"lampC2" : rows[0].lampC2,
			"lampC1TimerStatus" : rows[0].lampC1TimerStatus,
                        "lampC1TimerStart" : rows[0].lampC1TimerStart,
                        "lampC1TimerStop" : rows[0].lampC1TimerStop,
                        "lampC2TimerStatus" : rows[0].lampC2TimerStatus,
                        "lampC2TimerStart" : rows[0].lampC2TimerStart,
                        "lampC2TimerStop" : rows[0].lampC2TImerStop
			});
//		console.log(array);
                timerRoomC(array);
		setTimeout(dataGetRoomC, 1000);

	});
//	connection.end();
}
function dataGetRoomD(){
//	connection.connect();
	connection.query('SELECT * FROM tbl_room_d WHERE `id`=1;', function(err, rows, field){
		if(err) throw err;
		var array = [];
		array.push({
			"lampD1" : rows[0].lampD1,
			"lampD2" : rows[0].lampD2,
			"lampD1TimerStatus" : rows[0].lampD1TimerStatus,
                        "lampD1TimerStart" : rows[0].lampD1TimerStart,
                        "lampD1TimerStop" : rows[0].lampD1TimerStop,
                        "lampD2TimerStatus" : rows[0].lampD2TimerStatus,
                        "lampD2TimerStart" : rows[0].lampD2TimerStart,
                        "lampD2TimerStop" : rows[0].lampD2TImerStop
			});
//		console.log(array);
                timerRoomC(array);
		setTimeout(dataGetRoomD, 1000);

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
//            console.log("masuk a");
            if(now.hour() < lampA1TimerStart.hour() && now.hour() > lampA1TimerStop.hour()){
                if(lampA1 !== "off"){
                    var post  = {'lampA1': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampA1TimerStart.hour() && now.hour() >= lampA1TimerStop.hour()){
                if(now.hour() == lampA1TimerStart.hour()){
                    if(now.minute() >= lampA1TimerStart.minute()){
                        if(lampA1 !== "on"){
                            var post  = {lampA1: 'on'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampA1 !== "off"){
                            var post  = {'lampA1': 'off'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampA1 !== "on"){
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampA1TimerStart.hour() && now.hour() <= lampA1TimerStop.hour()){
                if(now.hour() == lampA1TimerStop.hour()){
                    if(now.minute() >= lampA1TimerStop.minute()){
                        if(lampA1 !== "off"){
                            var post  = {'lampA1': 'off'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampA1 !== "on"){
                            var post  = {lampA1: 'on'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampA1 !== "on"){
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampA1 !== "off"){
                    var post  = {'lampA1': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
//            console.log("masuk b");
            if(now.hour()==lampA1TimerStart.hour() && now.hour()==lampA1TimerStop.hour()){
                if(now.minute() < lampA1TimerStart.minute() && now.minute() > lampA1TimerStop.minute()){
                    if(lampA1 !== "off"){
                        var post  = {'lampA1': 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampA1TimerStart.minute() && now.minute() > lampA1TimerStop.minute()){
                    if(lampA1 !== "on"){
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampA1TimerStart.minute() && now.minute() < lampA1TimerStop.minute()){
                    if(lampA1 !== "on"){
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampA1 !== "off"){
                        var post  = {'lampA1': 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampA1 !== "on"){
                    var post  = {lampA1: 'on'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
//            console.log("masuk c");
            if(now.hour() < lampA1TimerStart.hour()){
                if(lampA1 !== "off"){
                    var post  = {'lampA1': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampA1TimerStart.hour() && now.hour() <= lampA1TimerStop.hour()){
                if(now.minute() >= lampA1TimerStart.minute() && now.minute() < lampA1TimerStop.minute()){
                    if(lampA1 !== "on"){
                        var post  = {lampA1: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampA1TimerStart.minute()){
                    if(lampA1 !== "off"){
                        var post  = {lampA1: 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampA1TimerStop.minute()){
                    if(lampA1 !== "off"){
                        var post  = {lampA1: 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampA1TimerStop.hour()){
                if(lampA1 !== "off"){
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
        var totHour = lampA2TimerStop.hour()-lampA2TimerStart.hour();
        var totMinute = lampA2TimerStop.minute()-lampA2TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampA2TimerStart.hour() && now.hour() > lampA2TimerStop.hour()){
                if(lampA2 !== "off"){
                    var post  = {'lampA2': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampA2TimerStart.hour() && now.hour() >= lampA2TimerStop.hour()){
                if(now.hour() == lampA2TimerStart.hour()){
                    if(now.minute() >= lampA2TimerStart.minute()){
                        if(lampA2 !== "on"){
                            var post  = {lampA2: 'on'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampA2 !== "off"){
                            var post  = {'lampA2': 'off'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampA2 !== "on"){
                        var post  = {lampA2: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampA2TimerStart.hour() && now.hour() <= lampA2TimerStop.hour()){
                if(now.hour() == lampA2TimerStop.hour()){
                    if(now.minute() >= lampA2TimerStop.minute()){
                        if(lampA2 !== "off"){
                            var post  = {'lampA2': 'off'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampA2 !== "on"){
                            var post  = {lampA2: 'on'};
                            connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampA2 !== "on"){
                        var post  = {lampA2: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampA2 !== "off"){
                    var post  = {'lampA2': 'off'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampA2TimerStart.hour() && now.hour()==lampA2TimerStop.hour()){
                if(now.minute() < lampA2TimerStart.minute() && now.minute() > lampA2TimerStop.minute()){
                    if(lampA2 !== "off"){
                        var post  = {'lampA2': 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampA2TimerStart.minute() && now.minute() > lampA2TimerStop.minute()){
                    if(lampA2 !== "on"){
                        var post  = {lampA2: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampA2TimerStart.minute() && now.minute() < lampA2TimerStop.minute()){
                    if(lampA2 !== "on"){
                        var post  = {lampA2: 'on'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampA2 !== "off"){
                        var post  = {'lampA2': 'off'};
                        connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampA2 !== "on"){
                    var post  = {lampA2: 'on'};
                    connection.query('UPDATE tbl_room_a SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
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
}

function timerRoomB(data){
    var now = time();
    if(data[0]["lampB1TimerStatus"]==="on"){
        var lampB1TimerStart = time(data[0]["lampB1TimerStart"],"H:m:s");
        var lampB1TimerStop = time(data[0]["lampB1TimerStop"],"H:m:s");
        var lampB1 = data[0]["lampB1"];
        var totHour = lampB1TimerStop.hour()-lampB1TimerStart.hour();
        var totMinute = lampB1TimerStop.minute()-lampB1TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampB1TimerStart.hour() && now.hour() > lampB1TimerStop.hour()){
                if(lampB1 !== "off"){
                    var post  = {'lampB1': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampB1TimerStart.hour() && now.hour() >= lampB1TimerStop.hour()){
                if(now.hour() == lampB1TimerStart.hour()){
                    if(now.minute() >= lampB1TimerStart.minute()){
                        if(lampB1 !== "on"){
                            var post  = {lampB1: 'on'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampB1 !== "off"){
                            var post  = {'lampB1': 'off'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampB1 !== "on"){
                        var post  = {lampB1: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampB1TimerStart.hour() && now.hour() <= lampB1TimerStop.hour()){
                if(now.hour() == lampB1TimerStop.hour()){
                    if(now.minute() >= lampB1TimerStop.minute()){
                        if(lampB1 !== "off"){
                            var post  = {'lampB1': 'off'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampB1 !== "on"){
                            var post  = {lampB1: 'on'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampB1 !== "on"){
                        var post  = {lampB1: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampB1 !== "off"){
                    var post  = {'lampB1': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampB1TimerStart.hour() && now.hour()==lampB1TimerStop.hour()){
                if(now.minute() < lampB1TimerStart.minute() && now.minute() > lampB1TimerStop.minute()){
                    if(lampB1 !== "off"){
                        var post  = {'lampB1': 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampB1TimerStart.minute() && now.minute() > lampB1TimerStop.minute()){
                    if(lampB1 !== "on"){
                        var post  = {lampB1: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampB1TimerStart.minute() && now.minute() < lampB1TimerStop.minute()){
                    if(lampB1 !== "on"){
                        var post  = {lampB1: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampB1 !== "off"){
                        var post  = {'lampB1': 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampB1 !== "on"){
                    var post  = {lampB1: 'on'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampB1TimerStart.hour()){
                if(lampB1 !== "off"){
                    var post  = {'lampB1': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampB1TimerStart.hour() && now.hour() <= lampB1TimerStop.hour()){
                if(now.minute() >= lampB1TimerStart.minute() && now.minute() < lampB1TimerStop.minute()){
                    if(lampB1 !== "on"){
                        var post  = {lampB1: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampB1TimerStart.minute()){
                    if(lampB1 !== "off"){
                        var post  = {lampB1: 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampB1TimerStop.minute()){
                    if(lampB1 !== "off"){
                        var post  = {lampB1: 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampB1TimerStop.hour()){
                if(lampB1 !== "off"){
                    var post  = {lampB1: 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }

    if(data[0]["lampB2TimerStatus"]==="on"){
        var lampB2TimerStart = time(data[0]["lampB2TimerStart"],"H:m:s");
        var lampB2TimerStop = time(data[0]["lampB2TimerStop"],"H:m:s");
        var lampB2 = data[0]["lampB2"];
        var totHour = lampB2TimerStop.hour()-lampB2TimerStart.hour();
        var totMinute = lampB2TimerStop.minute()-lampB2TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampB2TimerStart.hour() && now.hour() > lampB2TimerStop.hour()){
                if(lampB2 !== "off"){
                    var post  = {'lampB2': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampB2TimerStart.hour() && now.hour() >= lampB2TimerStop.hour()){
                if(now.hour() == lampB2TimerStart.hour()){
                    if(now.minute() >= lampB2TimerStart.minute()){
                        if(lampB2 !== "on"){
                            var post  = {lampB2: 'on'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampB2 !== "off"){
                            var post  = {'lampB2': 'off'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampB2 !== "on"){
                        var post  = {lampB2: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampB2TimerStart.hour() && now.hour() <= lampB2TimerStop.hour()){
                if(now.hour() == lampB2TimerStop.hour()){
                    if(now.minute() >= lampB2TimerStop.minute()){
                        if(lampB2 !== "off"){
                            var post  = {'lampB2': 'off'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampB2 !== "on"){
                            var post  = {lampB2: 'on'};
                            connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampB2 !== "on"){
                        var post  = {lampB2: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampB2 !== "off"){
                    var post  = {'lampB2': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampB2TimerStart.hour() && now.hour()==lampB2TimerStop.hour()){
                if(now.minute() < lampB2TimerStart.minute() && now.minute() > lampB2TimerStop.minute()){
                    if(lampB2 !== "off"){
                        var post  = {'lampB2': 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampB2TimerStart.minute() && now.minute() > lampB2TimerStop.minute()){
                    if(lampB2 !== "on"){
                        var post  = {lampB2: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampB2TimerStart.minute() && now.minute() < lampB2TimerStop.minute()){
                    if(lampB2 !== "on"){
                        var post  = {lampB2: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampB2 !== "off"){
                        var post  = {'lampB2': 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampB2 !== "on"){
                    var post  = {lampB2: 'on'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampB2TimerStart.hour()){
                if(lampB2 !== "off"){
                    var post  = {'lampB2': 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampB2TimerStart.hour() && now.hour() <= lampB2TimerStop.hour()){
                if(now.minute() >= lampB2TimerStart.minute() && now.minute() < lampB2TimerStop.minute()){
                    if(lampB2 !== "on"){
                        var post  = {lampB2: 'on'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampB2TimerStart.minute()){
                    if(lampB2 !== "off"){
                        var post  = {lampB2: 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampB2TimerStop.minute()){
                    if(lampB2 !== "off"){
                        var post  = {lampB2: 'off'};
                        connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampB2TimerStop.hour()){
                if(lampB2 !== "off"){
                    var post  = {lampB2: 'off'};
                    connection.query('UPDATE tbl_room_b SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }
}

function timerRoomC(data){
    var now = time();
    if(data[0]["lampC1TimerStatus"]==="on"){
        var lampC1TimerStart = time(data[0]["lampC1TimerStart"],"H:m:s");
        var lampC1TimerStop = time(data[0]["lampC1TimerStop"],"H:m:s");
        var lampC1 = data[0]["lampC1"];
        var totHour = lampC1TimerStop.hour()-lampC1TimerStart.hour();
        var totMinute = lampC1TimerStop.minute()-lampC1TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampC1TimerStart.hour() && now.hour() > lampC1TimerStop.hour()){
                if(lampC1 !== "off"){
                    var post  = {'lampC1': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampC1TimerStart.hour() && now.hour() >= lampC1TimerStop.hour()){
                if(now.hour() == lampC1TimerStart.hour()){
                    if(now.minute() >= lampC1TimerStart.minute()){
                        if(lampC1 !== "on"){
                            var post  = {lampC1: 'on'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampC1 !== "off"){
                            var post  = {'lampC1': 'off'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampC1 !== "on"){
                        var post  = {lampC1: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampC1TimerStart.hour() && now.hour() <= lampC1TimerStop.hour()){
                if(now.hour() == lampC1TimerStop.hour()){
                    if(now.minute() >= lampC1TimerStop.minute()){
                        if(lampC1 !== "off"){
                            var post  = {'lampC1': 'off'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampC1 !== "on"){
                            var post  = {lampC1: 'on'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampC1 !== "on"){
                        var post  = {lampC1: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampC1 !== "off"){
                    var post  = {'lampC1': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampC1TimerStart.hour() && now.hour()==lampC1TimerStop.hour()){
                if(now.minute() < lampC1TimerStart.minute() && now.minute() > lampC1TimerStop.minute()){
                    if(lampC1 !== "off"){
                        var post  = {'lampC1': 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampC1TimerStart.minute() && now.minute() > lampC1TimerStop.minute()){
                    if(lampC1 !== "on"){
                        var post  = {lampC1: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampC1TimerStart.minute() && now.minute() < lampC1TimerStop.minute()){
                    if(lampC1 !== "on"){
                        var post  = {lampC1: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampC1 !== "off"){
                        var post  = {'lampC1': 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampC1 !== "on"){
                    var post  = {lampC1: 'on'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampC1TimerStart.hour()){
                if(lampC1 !== "off"){
                    var post  = {'lampC1': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampC1TimerStart.hour() && now.hour() <= lampC1TimerStop.hour()){
                if(now.minute() >= lampC1TimerStart.minute() && now.minute() < lampC1TimerStop.minute()){
                    if(lampC1 !== "on"){
                        var post  = {lampC1: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampC1TimerStart.minute()){
                    if(lampC1 !== "off"){
                        var post  = {lampC1: 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampC1TimerStop.minute()){
                    if(lampC1 !== "off"){
                        var post  = {lampC1: 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampC1TimerStop.hour()){
                if(lampC1 !== "off"){
                    var post  = {lampC1: 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }
    if(data[0]["lampC2TimerStatus"]==="on"){
        var lampC2TimerStart = time(data[0]["lampC2TimerStart"],"H:m:s");
        var lampC2TimerStop = time(data[0]["lampC2TimerStop"],"H:m:s");
        var lampC2 = data[0]["lampC2"];
        var totHour = lampC2TimerStop.hour()-lampC2TimerStart.hour();
        var totMinute = lampC2TimerStop.minute()-lampC2TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampC2TimerStart.hour() && now.hour() > lampC2TimerStop.hour()){
                if(lampC2 !== "off"){
                    var post  = {'lampC2': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampC2TimerStart.hour() && now.hour() >= lampC2TimerStop.hour()){
                if(now.hour() == lampC2TimerStart.hour()){
                    if(now.minute() >= lampC2TimerStart.minute()){
                        if(lampC2 !== "on"){
                            var post  = {lampC2: 'on'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampC2 !== "off"){
                            var post  = {'lampC2': 'off'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampC2 !== "on"){
                        var post  = {lampC2: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampC2TimerStart.hour() && now.hour() <= lampC2TimerStop.hour()){
                if(now.hour() == lampC2TimerStop.hour()){
                    if(now.minute() >= lampC2TimerStop.minute()){
                        if(lampC2 !== "off"){
                            var post  = {'lampC2': 'off'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampC2 !== "on"){
                            var post  = {lampC2: 'on'};
                            connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampC2 !== "on"){
                        var post  = {lampC2: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampC2 !== "off"){
                    var post  = {'lampC2': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampC2TimerStart.hour() && now.hour()==lampC2TimerStop.hour()){
                if(now.minute() < lampC2TimerStart.minute() && now.minute() > lampC2TimerStop.minute()){
                    if(lampC2 !== "off"){
                        var post  = {'lampC2': 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampC2TimerStart.minute() && now.minute() > lampC2TimerStop.minute()){
                    if(lampC2 !== "on"){
                        var post  = {lampC2: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampC2TimerStart.minute() && now.minute() < lampC2TimerStop.minute()){
                    if(lampC2 !== "on"){
                        var post  = {lampC2: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampC2 !== "off"){
                        var post  = {'lampC2': 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampC2 !== "on"){
                    var post  = {lampC2: 'on'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampC2TimerStart.hour()){
                if(lampC2 !== "off"){
                    var post  = {'lampC2': 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampC2TimerStart.hour() && now.hour() <= lampC2TimerStop.hour()){
                if(now.minute() >= lampC2TimerStart.minute() && now.minute() < lampC2TimerStop.minute()){
                    if(lampC2 !== "on"){
                        var post  = {lampC2: 'on'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampC2TimerStart.minute()){
                    if(lampC2 !== "off"){
                        var post  = {lampC2: 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampC2TimerStop.minute()){
                    if(lampC2 !== "off"){
                        var post  = {lampC2: 'off'};
                        connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampC2TimerStop.hour()){
                if(lampC2 !== "off"){
                    var post  = {lampC2: 'off'};
                    connection.query('UPDATE tbl_room_c SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }
}

function timerRoomD(data){
    var now = time();
    if(data[0]["lampD1TimerStatus"]==="on"){
        var lampD1TimerStart = time(data[0]["lampD1TimerStart"],"H:m:s");
        var lampD1TimerStop = time(data[0]["lampD1TimerStop"],"H:m:s");
        var lampD1 = data[0]["lampD1"];
        var totHour = lampD1TimerStop.hour()-lampD1TimerStart.hour();
        var totMinute = lampD1TimerStop.minute()-lampD1TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampD1TimerStart.hour() && now.hour() > lampD1TimerStop.hour()){
                if(lampD1 !== "off"){
                    var post  = {'lampD1': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampD1TimerStart.hour() && now.hour() >= lampD1TimerStop.hour()){
                if(now.hour() == lampD1TimerStart.hour()){
                    if(now.minute() >= lampD1TimerStart.minute()){
                        if(lampD1 !== "on"){
                            var post  = {lampD1: 'on'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampD1 !== "off"){
                            var post  = {'lampD1': 'off'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampD1 !== "on"){
                        var post  = {lampD1: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampD1TimerStart.hour() && now.hour() <= lampD1TimerStop.hour()){
                if(now.hour() == lampD1TimerStop.hour()){
                    if(now.minute() >= lampD1TimerStop.minute()){
                        if(lampD1 !== "off"){
                            var post  = {'lampD1': 'off'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampD1 !== "on"){
                            var post  = {lampD1: 'on'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampD1 !== "on"){
                        var post  = {lampD1: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampD1 !== "off"){
                    var post  = {'lampD1': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampD1TimerStart.hour() && now.hour()==lampD1TimerStop.hour()){
                if(now.minute() < lampD1TimerStart.minute() && now.minute() > lampD1TimerStop.minute()){
                    if(lampD1 !== "off"){
                        var post  = {'lampD1': 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampD1TimerStart.minute() && now.minute() > lampD1TimerStop.minute()){
                    if(lampD1 !== "on"){
                        var post  = {lampD1: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampD1TimerStart.minute() && now.minute() < lampD1TimerStop.minute()){
                    if(lampD1 !== "on"){
                        var post  = {lampD1: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampD1 !== "off"){
                        var post  = {'lampD1': 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampD1 !== "on"){
                    var post  = {lampD1: 'on'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampD1TimerStart.hour()){
                if(lampD1 !== "off"){
                    var post  = {'lampD1': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampD1TimerStart.hour() && now.hour() <= lampD1TimerStop.hour()){
                if(now.minute() >= lampD1TimerStart.minute() && now.minute() < lampD1TimerStop.minute()){
                    if(lampD1 !== "on"){
                        var post  = {lampD1: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampD1TimerStart.minute()){
                    if(lampD1 !== "off"){
                        var post  = {lampD1: 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampD1TimerStop.minute()){
                    if(lampD1 !== "off"){
                        var post  = {lampD1: 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampD1TimerStop.hour()){
                if(lampD1 !== "off"){
                    var post  = {lampD1: 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }

    if(data[0]["lampD2TimerStatus"]==="on"){
        var lampD2TimerStart = time(data[0]["lampD2TimerStart"],"H:m:s");
        var lampD2TimerStop = time(data[0]["lampD2TimerStop"],"H:m:s");
        var lampD2 = data[0]["lampD2"];
        var totHour = lampD2TimerStop.hour()-lampD2TimerStart.hour();
        var totMinute = lampD2TimerStop.minute()-lampD2TimerStart.minute();
        if(totHour < 0){
            if(now.hour() < lampD2TimerStart.hour() && now.hour() > lampD2TimerStop.hour()){
                if(lampD2 !== "off"){
                    var post  = {'lampD2': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampD2TimerStart.hour() && now.hour() >= lampD2TimerStop.hour()){
                if(now.hour() == lampD2TimerStart.hour()){
                    if(now.minute() >= lampD2TimerStart.minute()){
                        if(lampD2 !== "on"){
                            var post  = {lampD2: 'on'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampD2 !== "off"){
                            var post  = {'lampD2': 'off'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampD2 !== "on"){
                        var post  = {lampD2: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() < lampD2TimerStart.hour() && now.hour() <= lampD2TimerStop.hour()){
                if(now.hour() == lampD2TimerStop.hour()){
                    if(now.minute() >= lampD2TimerStop.minute()){
                        if(lampD2 !== "off"){
                            var post  = {'lampD2': 'off'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                    else{
                        if(lampD2 !== "on"){
                            var post  = {lampD2: 'on'};
                            connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                            });
                        }
                    }
                }
                else{
                    if(lampD2 !== "on"){
                        var post  = {lampD2: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampD2 !== "off"){
                    var post  = {'lampD2': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else if(totHour == 0 && totMinute <= 0){
            if(now.hour()==lampD2TimerStart.hour() && now.hour()==lampD2TimerStop.hour()){
                if(now.minute() < lampD2TimerStart.minute() && now.minute() > lampD2TimerStop.minute()){
                    if(lampD2 !== "off"){
                        var post  = {'lampD2': 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampD2TimerStart.minute() && now.minute() > lampD2TimerStop.minute()){
                    if(lampD2 !== "on"){
                        var post  = {lampD2: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampD2TimerStart.minute() && now.minute() < lampD2TimerStop.minute()){
                    if(lampD2 !== "on"){
                        var post  = {lampD2: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else{
                    if(lampD2 !== "off"){
                        var post  = {'lampD2': 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else{
                if(lampD2 !== "on"){
                    var post  = {lampD2: 'on'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
        else{
            if(now.hour() < lampD2TimerStart.hour()){
                if(lampD2 !== "off"){
                    var post  = {'lampD2': 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
            else if(now.hour() >= lampD2TimerStart.hour() && now.hour() <= lampD2TimerStop.hour()){
                if(now.minute() >= lampD2TimerStart.minute() && now.minute() < lampD2TimerStop.minute()){
                    if(lampD2 !== "on"){
                        var post  = {lampD2: 'on'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() < lampD2TimerStart.minute()){
                    if(lampD2 !== "off"){
                        var post  = {lampD2: 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
                else if(now.minute() >= lampD2TimerStop.minute()){
                    if(lampD2 !== "off"){
                        var post  = {lampD2: 'off'};
                        connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                        });
                    }
                }
            }
            else if(now.hour() > lampD2TimerStop.hour()){
                if(lampD2 !== "off"){
                    var post  = {lampD2: 'off'};
                    connection.query('UPDATE tbl_room_d SET ? WHERE `id` = 1', post, function(err, result) {
                    });
                }
            }
        }
    }
}

console.log("Server node is running");
dataGetRoomA();
dataGetRoomB();
dataGetRoomC();
dataGetRoomD();
