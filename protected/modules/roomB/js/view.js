$(document).ready(function() {

    $("#lampB1").bootstrapSwitch();
    $("#lampB2").bootstrapSwitch();
    
    $("#lampB1").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampB1="on";
            $.getJSON( webroot + '/roomB/lampB1?data=' + lampB1, function(roomB){
//                  alert(roomA.data);
            });
        }
        else{
            var lampB1="off";
            $.getJSON( webroot + '/roomB/lampB1?data=' + lampB1, function(roomB){
//                  alert(roomA.data);
            });
        }
      });
      
      $("#lampB2").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampB2="on";
            $.getJSON( webroot + '/roomB/lampB2?data=' + lampB2, function(roomB){
//                  alert(roomA.data);
            });
        }
        else{
            var lampB2="off";
            $.getJSON( webroot + '/roomB/lampB2?data=' + lampB2, function(roomB){
//                  alert(roomA.data);
            });
        }
      });
      
      $('.clockpicker').clockpicker({
            autoclose: true,
      });
      
      $("#buttonLamp1").on('click',function(){
           var lampB1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lampB1TimerStop= $("input[name='lamp1TimerStop']").val();
           
           if(lampB1TimerStart != "" && lampB1TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomB/lampB1Timer?start=' + lampB1TimerStart +'&stop='+  lampB1TimerStop, function(roomA){
                    
                    setTimeout(function () {
                        $btn.button('reset');
                    }, 1000);
                });
           }
           else{
               alert("Please input timer");
           }
      });
      
      $("#buttonLamp2").click(function(){
           var lampB2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lampB2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lampB2TimerStart != "" && lampB2TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomB/lampB2Timer?start=' + lampB2TimerStart +'&stop='+  lampB2TimerStop, function(roomA){
                    
                    setTimeout(function () {
                        $btn.button('reset');
                    }, 1000);
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
            $.getJSON( webroot + '/roomB/lampB1TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp1").hide();
            var status="off";
            $.getJSON( webroot + '/roomB/lampB1TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true){
            $("#lamp2").show();
            var status="on";
            $.getJSON( webroot + '/roomB/lampB2TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp2").hide();
            var status="off";
            $.getJSON( webroot + '/roomB/lampB2TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB2").bootstrapSwitch('disabled',false);
        }
   });

});
