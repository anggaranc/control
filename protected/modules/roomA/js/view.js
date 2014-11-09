$(document).ready(function() {
    
    $("#lampA1").bootstrapSwitch();
    $("#lampA2").bootstrapSwitch();
    
    $("#lampA1").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampA1="off";
            $.getJSON( webroot + '/roomA/lampA1?data=' + lampA1, function(roomA){
//                  alert(roomA.data);
            });
        }
        else{
            var lampA1="on";
            $.getJSON( webroot + '/roomA/lampA1?data=' + lampA1, function(roomA){
//                  alert(roomA.data);
            });
        }
      });
      
      $("#lampA2").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampA2="off";
            $.getJSON( webroot + '/roomA/lampA2?data=' + lampA2, function(roomA){
//                  alert(roomA.data);
            });
        }
        else{
            var lampA2="on";
            $.getJSON( webroot + '/roomA/lampA2?data=' + lampA2, function(roomA){
//                  alert(roomA.data);
            });
        }
      });
});
