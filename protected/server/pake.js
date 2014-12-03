var mysql = require('mysql');
var connection  = mysql.createPool({
	host	: "localhost",
	user	: "root",
	password: "",
	database: "home"
});

function dataGetRoom(){
    connection.query('SELECT * FROM tbl_room_a a JOIN tbl_room_b b on b.id=a.id JOIN tbl_room_c c on c.id=b.id JOIN tbl_room_d d on d.id=c.id WHERE a.`id`=1;', function(err, rows, fields) {
      if (err) throw err;

        var arrayRoomA = [];
        var arrayRoomB = [];
        var arrayRoomC = [];
        var arrayRoomD = [];
        arrayRoomA.push({
                "lampA1" : rows[0].lampA1,
                "lampA2" : rows[0].lampA2,
                "lampA1TimerStatus" : rows[0].lampA1TimerStatus,
                "lampA1TimerStart" : rows[0].lampA1TimerStart,
                "lampA1TimerStop" : rows[0].lampA1TimerStop,
                "lampA2TimerStatus" : rows[0].lampA2TimerStatus,
                "lampA2TimerStart" : rows[0].lampA2TimerStart,
                "lampA2TimerStop" : rows[0].lampA2TimerStop
                });


        arrayRoomB.push({
                "lampB1" : rows[0].lampB1,
                "lampB2" : rows[0].lampB2,
                "lampB1TimerStatus" : rows[0].lampB1TimerStatus,
                "lampB1TimerStart" : rows[0].lampB1TimerStart,
                "lampB1TimerStop" : rows[0].lampB1TimerStop,
                "lampB2TimerStatus" : rows[0].lampB2TimerStatus,
                "lampB2TimerStart" : rows[0].lampB2TimerStart,
                "lampB2TimerStop" : rows[0].lampB2TimerStop
                });

        arrayRoomC.push({
                "lampC1" : rows[0].lampC1,
                "lampC2" : rows[0].lampC2,
                "lampC1TimerStatus" : rows[0].lampC1TimerStatus,
                "lampC1TimerStart" : rows[0].lampC1TimerStart,
                "lampC1TimerStop" : rows[0].lampC1TimerStop,
                "lampC2TimerStatus" : rows[0].lampC2TimerStatus,
                "lampC2TimerStart" : rows[0].lampC2TimerStart,
                "lampC2TimerStop" : rows[0].lampC2TimerStop
                });

        arrayRoomD.push({
                "lampD1" : rows[0].lampD1,
                "lampD2" : rows[0].lampD2,
                "lampD1TimerStatus" : rows[0].lampD1TimerStatus,
                "lampD1TimerStart" : rows[0].lampD1TimerStart,
                "lampD1TimerStop" : rows[0].lampD1TimerStop,
                "lampD2TimerStatus" : rows[0].lampD2TimerStatus,
                "lampD2TimerStart" : rows[0].lampD2TimerStart,
                "lampD2TimerStop" : rows[0].lampD2TimerStop
                });
        timerRoomA(arrayRoomA);
        timerRoomB(arrayRoomB);
        timerRoomC(arrayRoomC);
        timerRoomD(arrayRoomD);
        
        setTimeout(dataGetRoom, 1000);
    });
}

dataGetRoom();