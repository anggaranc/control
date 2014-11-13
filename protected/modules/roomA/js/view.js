$(document).ready(function() {
    
   $("#lamp1checked").click(function() {
        var checkbox = $('#lamp1checked');
        if(checkbox.prop('checked') == true)
            $("#lamp1").show();
        else{
            $("#lamp1").hide();
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true)
            $("#lamp2").show();
        else{
            $("#lamp2").hide();
            
        }
   });
        
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
      
      $("#lamp1Start").DateTimePicker();
      $("#lamp1Stop").DateTimePicker();
      $("#lamp2Start").DateTimePicker();
      $("#lamp2Stop").DateTimePicker();
      
      $("#buttonLamp1").click(function(){
           var lamp1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lamp1TimerStop= $("input[name='lamp1TimerStop']").val();
           
           if(lamp1TimerStart != "" && lamp1TimerStop != ""){
                $.getJSON( webroot + '/roomA/lampA1Timer?start=' + lamp1TimerStart +'&stop='+  lamp1TimerStop, function(roomA1){
                });
           }
           else{
               alert("Please input timer");
           }
      });
      
      $("#buttonLamp2").click(function(){
           var lamp2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lamp2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lamp2TimerStart != "" && lamp2TimerStop != ""){
            $.getJSON( webroot + '/roomA/lampA2Timer?start=' + lamp2TimerStart +'&stop='+  lamp2TimerStop, function(roomA1){
            });
           }
           else{
               alert("Please input timer");
           }
           
      });
          
});
