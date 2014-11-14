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
      
      $("#lamp1Start").DateTimePicker();
      $("#lamp1Stop").DateTimePicker();
      $("#lamp2Start").DateTimePicker();
      $("#lamp2Stop").DateTimePicker();
      
      $("#buttonLamp1").click(function(){
           var lampA1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lampA1TimerStop= $("input[name='lamp1TimerStop']").val();
           
           if(lamp1TimerStart != "" && lamp1TimerStop != ""){
                $.getJSON( webroot + '/roomA/lampA1Timer?start=' + lampA1TimerStart +'&stop='+  lampA1TimerStop, function(roomA){
                });
           }
           else{
               alert("Please input timer");
           }
      });
      
      $("#buttonLamp2").click(function(){
           var lampA2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lampA2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lamp2TimerStart != "" && lamp2TimerStop != ""){
            $.getJSON( webroot + '/roomA/lampA2Timer?start=' + lampA2TimerStart +'&stop='+  lampA2TimerStop, function(roomA){
            });
           }
           else{
               alert("Please input timer");
           }
           
      });
          
      $("#lamp1checked").click(function() {
        var checkbox = $('#lamp1checked');
        if(checkbox.prop('checked') == true){
            $("#lamp1").show();
            var status="on";
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $('#lampA1').prop('readonly', true);
            $('.bootstrap-switch-id-lampA1').addClass('bootstrap-switch-readonly');
        }
        else{
            $("#lamp1").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $('#lampA1').prop('readonly', false);
            $('.bootstrap-switch-id-lampA1').removeClass('bootstrap-switch-readonly');
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true){
            $("#lamp2").show();
            var status="on";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $('#lampA1').prop('readonly', true);
            $('.bootstrap-switch-id-lampA2').addClass('bootstrap-switch-readonly');
        }
        else{
            $("#lamp2").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $('#lampA1').prop('readonly', false);
            $('.bootstrap-switch-id-lampA2').removeClass('bootstrap-switch-readonly');
        }
   });
});
