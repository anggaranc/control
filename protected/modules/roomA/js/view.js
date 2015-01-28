$(document).ready(function() {

    $("#lampA1").bootstrapSwitch();
    $("#lampA2").bootstrapSwitch();
    
    $("#lampA1").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampA1="on";
            $.getJSON( webroot + '/roomA/lampA1?data=' + lampA1, function(roomA){
//                  alert(roomA.data);
            });
        }
        else{
            var lampA1="off";
            $.getJSON( webroot + '/roomA/lampA1?data=' + lampA1, function(roomA){
//                  alert(roomA.data);
            });
        }
      });
      
      $("#lampA2").on('switchChange.bootstrapSwitch', function(event, state) {
        if(state===true){
            var lampA2="on";
            $.getJSON( webroot + '/roomA/lampA2?data=' + lampA2, function(roomA){
//                  alert(roomA.data);
            });
        }
        else{
            var lampA2="off";
            $.getJSON( webroot + '/roomA/lampA2?data=' + lampA2, function(roomA){
//                  alert(roomA.data);
            });
        }
      });
      
      $('.clockpicker').clockpicker({
            autoclose: true,
      });
      
      $("#buttonLamp1").on('click',function(){
           var lampA1TimerStart= $("input[name='lamp1TimerStart']").val();
           var lampA1TimerStop= $("input[name='lamp1TimerStop']").val();
           if(lampA1TimerStart != "" && lampA1TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomA/lampA1Timer?start=' + lampA1TimerStart +'&stop='+  lampA1TimerStop, function(roomA){
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
           var lampA2TimerStart= $("input[name='lamp2TimerStart']").val();
           var lampA2TimerStop= $("input[name='lamp2TimerStop']").val();
           if(lampA2TimerStart != "" && lampA2TimerStop != ""){
                var $btn = $(this);
                $btn.button('loading');
                $.getJSON( webroot + '/roomA/lampA2Timer?start=' + lampA2TimerStart +'&stop='+  lampA2TimerStop, function(roomA){
                    
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
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA1").bootstrapSwitch('state',false);
            $("#lampA1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp1").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lamp2checked").click(function() {
        var checkbox = $('#lamp2checked');
        if(checkbox.prop('checked') == true){
            $("#lamp2").show();
            var status="on";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA2").bootstrapSwitch('state',false);
            $("#lampA2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lamp2").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA2").bootstrapSwitch('disabled',false);
        }
   });
   
 
   setInterval(refreshDiv, 3000); 
   function refreshDiv(){
    $.ajax({
      url: webroot+"/roomA/json",
      dataType: "json",
      type: "get",
      success: function(data){
          if(data.ldrA1==="on"){
              if ($(".ldr1.label-danger").length){
                  $(".ldr1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldr1.label-success").length){
                $(".ldr1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrA2==="on"){
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



