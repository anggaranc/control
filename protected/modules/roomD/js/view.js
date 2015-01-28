$(document).ready(function() {

    $("#lampD1").bootstrapSwitch();
    $("#lampD2").bootstrapSwitch();
    
    $("#lampD1").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampD1="on";
            $.getJSON( webroot + '/roomD/lampD1?data=' + lampD1, function(roomD){
//                  alert(roomD.data);
            });
        }
        else{
            var lampD1="off";
            $.getJSON( webroot + '/roomD/lampD1?data=' + lampD1, function(roomD){
//                  alert(roomD.data);
            });
        }
      });
      
      $("#lampD2").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampD2="on";
            $.getJSON( webroot + '/roomD/lampD2?data=' + lampD2, function(roomD){
//                  alert(roomD.data);
            });
        }
        else{
            var lampD2="off";
            $.getJSON( webroot + '/roomD/lampD2?data=' + lampD2, function(roomD){
//                  alert(roomD.data);
            });
        }
      });
      
      $('.clockpicker').clockpicker({
            autoclose: true,
      });
      
      $("#buttonLamp1").on('click',function(){
           var lampD1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lampD1TimerStop= $("input[name='lamp1TimerStop']").val();
           
           if(lampD1TimerStart != "" && lampD1TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomD/lampD1Timer?start=' + lampD1TimerStart +'&stop='+  lampD1TimerStop, function(roomD){
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
           var lampD2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lampD2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lampD2TimerStart != "" && lampD2TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomD/lampD2Timer?start=' + lampD2TimerStart +'&stop='+  lampD2TimerStop, function(roomD){
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
            $.getJSON( webroot + '/roomD/lampD1TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('state',false);
            $("#lampD1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp1").hide();
            var status="off";
            $.getJSON( webroot + '/roomD/lampD1TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true){
            $("#lamp2").show();
            var status="on";
            $.getJSON( webroot + '/roomD/lampD2TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('state',false);
            $("#lampD2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp2").hide();
            var status="off";
            $.getJSON( webroot + '/roomD/lampD2TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD2").bootstrapSwitch('disabled',false);
        }
   });
   
   
   setInterval(refreshDiv, 3000); 
   function refreshDiv(){
    $.ajax({
      url: webroot+"/roomD/json",
      dataType: "json",
      type: "get",
      success: function(data){
          if(data.ldrD1==="on"){
              if ($(".ldr1.label-danger").length){
                  $(".ldr1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldr1.label-success").length){
                $(".ldr1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrD2==="on"){
              if ($(".ldr2.label-danger").length){
                  $(".ldr2").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldr2.label-success").length){
                $(".ldr2").toggleClass('label-success label-danger');
              }
          }
          
      }
    });
   }

});



