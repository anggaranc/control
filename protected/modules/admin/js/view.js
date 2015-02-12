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
      
      $("#buttonLampA1").on('click',function(){
           var lampA1TimerStart= $("input[name='lampA1TimerStart']").val();
           var lampA1TimerStop= $("input[name='lampA1TimerStop']").val();
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
      
      $("#buttonLampA2").click(function(){
           var lampA2TimerStart= $("input[name='lampA2TimerStart']").val();
           var lampA2TimerStop= $("input[name='lampA2TimerStop']").val();
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
          
      $("#lampA1checked").click(function() {
        var checkbox = $('#lampA1checked');
        if(checkbox.prop('checked') == true){
            $("#lampA1status").show();
            var status="on";
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA1").bootstrapSwitch('state',false);
            $("#lampA1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampA1status").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA1TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lampA2checked").click(function() {
        var checkbox = $('#lampA2checked');
        if(checkbox.prop('checked') == true){
            $("#lampA2status").show();
            var status="on";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA2").bootstrapSwitch('state',false);
            $("#lampA2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampA2status").hide();
            var status="off";
            $.getJSON( webroot + '/roomA/lampA2TimerStatus?data=' + status, function(roomA){
            });
            $("#lampA2").bootstrapSwitch('disabled',false);
        }
   });
   
 
//   setInterval(refreshDiv, 3000); 
//   function refreshDiv(){
//    
//   }
   
   
   //B
   
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
      
      $("#buttonLampB1").on('click',function(){
           var lampB1TimerStart= $("input[name='lampB1TimerStart']").val();
           var lampB1TimerStop= $("input[name='lampB1TimerStop']").val();
           
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
      
      $("#buttonLampB2").click(function(){
           var lampB2TimerStart= $("input[name='lampB2TimerStart']").val();
           var lampB2TimerStop= $("input[name='lampB2TimerStop']").val();
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
          
      $("#lampB1checked").click(function() {
        var checkbox = $('#lampB1checked');
        if(checkbox.prop('checked') == true){
            $("#lampB1status").show();
            var status="on";
            $.getJSON( webroot + '/roomB/lampB1TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB1").bootstrapSwitch('state',false);
            $("#lampB1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampB1status").hide();
            var status="off";
            $.getJSON( webroot + '/roomB/lampB1TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lampB2checked").click(function() {
        var checkbox = $('#lampB2checked');
        if(checkbox.prop('checked') == true){
            $("#lampB2status").show();
            var status="on";
            $.getJSON( webroot + '/roomB/lampB2TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB2").bootstrapSwitch('state',false);
            $("#lampB2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampB2status").hide();
            var status="off";
            $.getJSON( webroot + '/roomB/lampB2TimerStatus?data=' + status, function(roomB){
            });
            $("#lampB2").bootstrapSwitch('disabled',false);
        }
   });
   
//   setInterval(refreshDiv, 3000); 
//   function refreshDiv(){
//    
//   }
   
   //C
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
      
      $("#buttonLampC1").on('click',function(){
           var lampC1TimerStart= $("input[name='lampC1TimerStart']").val();
           var lampC1TimerStop= $("input[name='lampC1TimerStop']").val();
           
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
      
      $("#buttonLampC2").click(function(){
           var lampC2TimerStart= $("input[name='lampC2TimerStart']").val();
           var lampC2TimerStop= $("input[name='lampC2TimerStop']").val();
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
          
      $("#lampC1checked").click(function() {
        var checkbox = $('#lampC1checked');
        if(checkbox.prop('checked') == true){
            $("#lampC1status").show();
            var status="on";
            $.getJSON( webroot + '/roomC/lampC1TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC1").bootstrapSwitch('state',false);
            $("#lampC1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampC1status").hide();
            var status="off";
            $.getJSON( webroot + '/roomC/lampC1TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lampC2checked").click(function() {
        var checkbox = $('#lampC2checked');
        if(checkbox.prop('checked') == true){
            $("#lampC2status").show();
            var status="on";
            $.getJSON( webroot + '/roomC/lampC2TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC2").bootstrapSwitch('state',false);
            $("#lampC2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampC2status").hide();
            var status="off";
            $.getJSON( webroot + '/roomC/lampC2TimerStatus?data=' + status, function(roomC){
            });
            $("#lampC2").bootstrapSwitch('disabled',false);
        }
   });
   
//   setInterval(refreshDiv, 3000); 
//   function refreshDiv(){
//    
//   }
   
   
   //D
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
      
      $("#buttonLampD1").on('click',function(){
           var lampD1TimerStart= $("input[name='lampD1TimerStart']").val();
           var lampD1TimerStop= $("input[name='lamp1DTimerStop']").val();
           
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
      
      $("#buttonLampD2").click(function(){
           var lampD2TimerStart= $("input[name='lampD2TimerStart']").val();
           var lampD2TimerStop= $("input[name='lampD2TimerStop']").val();
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
          
      $("#lampD1checked").click(function() {
        var checkbox = $('#lampD1checked');
        if(checkbox.prop('checked') == true){
            $("#lampD1status").show();
            var status="on";
            $.getJSON( webroot + '/roomD/lampD1TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('state',false);
            $("#lampD1").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampD1status").hide();
            var status="off";
            $.getJSON( webroot + '/roomD/lampD1TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('disabled',false);
        }
   });
   
   $("#lampD2checked").click(function() {
        var checkbox = $('#lampD2checked');
        if(checkbox.prop('checked') == true){
            $("#lampD2status").show();
            var status="on";
            $.getJSON( webroot + '/roomD/lampD2TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD1").bootstrapSwitch('state',false);
            $("#lampD2").bootstrapSwitch('disabled',true);
        }
        else{
            $("#lampD2status").hide();
            var status="off";
            $.getJSON( webroot + '/roomD/lampD2TimerStatus?data=' + status, function(roomD){
            });
            $("#lampD2").bootstrapSwitch('disabled',false);
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
              if ($(".ldrA1.label-danger").length){
                  $(".ldrA1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrA1.label-success").length){
                $(".ldrA1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrA2==="on"){
              if ($(".ldrA2.label-danger").length){
                  $(".ldrA2").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrA2.label-success").length){
                $(".ldrA2").toggleClass('label-success label-danger');
              }
          }
          
      }
    });
    
    
    //b
       
    $.ajax({
      url: webroot+"/roomB/json",
      dataType: "json",
      type: "get",
      success: function(data){
          if(data.ldrB1==="on"){
              if ($(".ldrB1.label-danger").length){
                  $(".ldrB1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrB1.label-success").length){
                $(".ldrB1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrB2==="on"){
              if ($(".ldrB2.label-danger").length){
                  $(".ldrB2").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrB2.label-success").length){
                $(".ldrB2").toggleClass('label-success label-danger');
              }
          }
          
      }
    });
    
    //c
    
    $.ajax({
      url: webroot+"/roomC/json",
      dataType: "json",
      type: "get",
      success: function(data){
          if(data.ldrC1==="on"){
              if ($(".ldrC1.label-danger").length){
                  $(".ldrC1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrC1.label-success").length){
                $(".ldrC1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrC2==="on"){
              if ($(".ldrC2.label-danger").length){
                  $(".ldrC2").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrC2.label-success").length){
                $(".ldrC2").toggleClass('label-success label-danger');
              }
          }
          
      }
    });
      
    $.ajax({
      url: webroot+"/roomD/json",
      dataType: "json",
      type: "get",
      success: function(data){
          if(data.ldrD1==="on"){
              if ($(".ldrD1.label-danger").length){
                  $(".ldrD1").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrD1.label-success").length){
                $(".ldrD1").toggleClass('label-success label-danger');
              }
          }
          
          if(data.ldrD2==="on"){
              if ($(".ldrD2.label-danger").length){
                  $(".ldrD2").toggleClass('label-danger label-success');
              }
          }
          else{
              if ($(".ldrD2.label-success").length){
                $(".ldrD2").toggleClass('label-success label-danger');
              }
          }
          
      }
    });
   }

});



