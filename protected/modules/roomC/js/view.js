$(document).ready(function() {

    $("#lampC1").bootstrapSwitch();
    $("#lampC2").bootstrapSwitch();
    
    $("#lampC1").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampC1="on";
            $.getJSON( webroot + '/roomC/lampC1?data=' + lampC1, function(roomC){
//                  alert(roomC.data);
            });
        }
        else{
            var lampC1="off";
            $.getJSON( webroot + '/roomC/lampC1?data=' + lampC1, function(roomC){
//                  alert(roomC.data);
            });
        }
      });
      
      $("#lampC2").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampC2="on";
            $.getJSON( webroot + '/roomC/lampC2?data=' + lampC2, function(roomC){
//                  alert(roomC.data);
            });
        }
        else{
            var lampC2="off";
            $.getJSON( webroot + '/roomC/lampC2?data=' + lampC2, function(roomC){
//                  alert(roomC.data);
            });
        }
      });
      
      $('.clockpicker').clockpicker({
            autoclose: true,
      });
      
      $("#buttonLamp1").on('click',function(){
           var lampC1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lampC1TimerStop= $("input[name='lamp1TimerStop']").val();
           
           if(lampC1TimerStart != "" && lampC1TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomC/lampC1Timer?start=' + lampC1TimerStart +'&stop='+  lampC1TimerStop, function(roomC){
                    
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
           var lampC2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lampC2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lampC2TimerStart != "" && lampC2TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomC/lampC2Timer?start=' + lampC2TimerStart +'&stop='+  lampC2TimerStop, function(roomC){
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
            $.getJSON( webroot + '/roomC/lampC1TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp1").hide();
            var status="off";
            $.getJSON( webroot + '/roomC/lampC1TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true){
            $("#lamp2").show();
            var status="on";
            $.getJSON( webroot + '/roomC/lampC2TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp2").hide();
            var status="off";
            $.getJSON( webroot + '/roomC/lampC2TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC2").bootstrapSwitch('disabled',false);
        }
   });

});



