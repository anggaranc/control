var mysql = require('mysql');
var pool  = mysql.createPool({
	host	: "localhost",
	user	: "root",
	password: "",
	database: "home"
});

function dataGetRoomA(){
pool.query('SELECT * FROM tbl_room_a WHERE `id`=1;', function(err, rows, fields) {
  if (err) throw err;

  console.log('The solution is: ', rows[0].lampA1);
  setTimeout(dataGetRoomA, 1000);
});
}

dataGetRoomA();