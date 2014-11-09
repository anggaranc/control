$(document).ready(function() { 
    $('.field_label').each(function() {
        var currentValue = $.trim($(this).text());
            
        if (currentValue.length == 0) {
            currentValue = loopChar('&nbsp;', 42);
        }
        
        $(this).html(currentValue);        
    });
       
    $('.field_label').click(function() {    
        var currentValue = $.trim($(this).text());
        
        $(this).prev().show().val(currentValue);
        $(this).prev().focus();
        $(this).hide();
    });
    
    $('#label_principal_pic_name').click(function() {
        $('#btn_principal_pic_ok').show();
        $('#pic_list').show();
        $('#pic_container').hide();
    });
    
    $('#label_vendor_pic_name').click(function() {
        $('#btn_employee_ok').show();
        $('#employee_list').show();
        $('#employee_container').hide();
    });
    
    $('#po_to_connected_remarks_label').click(function() {
            
    });
    
    $('#btn_principal_pic_ok').click(function() {
        $('#pic_list').hide();
        $(this).hide();
        
        var selectedPic = $('#pic_list').val();
        
        if (selectedPic == "") {
        	$("#label_principal_pic_name").html(loopChar("&nbsp;", 40));
        	$("#label_principal_pic_phone").html("");	
        }
        else {
			var splitted = selectedPic.split('|');
        
	        $("#label_principal_pic_name").html(splitted[1]);
	        $("#label_principal_pic_phone").html(splitted[2]);
        }
        
      	$('#pic_container').show();
    });
    
    $('#btn_employee_ok').click(function() {
        $('#employee_list').hide();
        $(this).hide();
        
        var selectedEmployee = $(this).prev().val();
        
        if (selectedEmployee == "") {
        	$("#label_vendor_pic_name").html(loopChar("&nbsp;", 40));	
        }
        else {
        	var splitted = selectedEmployee.split('|');
        	
        	$("#label_vendor_pic_name").html(splitted[1]);
        }
        
        $('#employee_container').show();
    });
    
    $('.field_input').keyup(function(event) {
        if (event.which == 13) {
            var currentValue = $.trim($(this).val());
            
            if (currentValue.length == 0) {
                currentValue = loopChar('&nbsp;', 42);
            }
                
            $(this).next().show().html(currentValue);
            $(this).hide();
        }
    });
    
    $('#button_print').click(function() {
        window.print();
    });
    
    $('#button_save').click(function() {
        var assignmentId = $('#assignment_id').val();
        var customerName = $.trim($('#label_customer_name').text());
        var siteNumber = $.trim($('#label_site_number').text());
        var siteName = $.trim($('#label_site_name').text());
        var remarks = $.trim($('#label_keterangan').text());
        var projectName = $.trim($('#label_project_name').text());
        var skBoqRemarks = $.trim($('#label_sk_boq_remarks').text());
        var poToConnectedRemarks = $.trim($('#label_po_to_connected_remarks').text());
        
        /**
         * Principal PIC
         */
        var selectedPrincipalPic = $('#pic_list').val();
        var splitPrincipalPic = selectedPrincipalPic.split('|');
        
        /**
         * Project Manager
         */
        var selectedEmployee = $('#employee_list').val();
        var splitEmployee = selectedEmployee.split('|');
        
        var data = 
            "sId=progress&" +
            "&assignmentId=" + assignmentId +
            "&customerName=" + customerName +
            "&siteNumber=" + siteNumber +
            "&siteName=" + siteName +
            "&remarks=" + remarks +
            "&projectName=" + projectName +
            "&skBoqRemarks=" + skBoqRemarks +
            "&poToConnectedRemarks=" + poToConnectedRemarks +
            "&principal=" + splitPrincipalPic[0] +
            "&employee=" + splitEmployee[0];
        
        $.ajax({
            url: 'https://localhost/kpm/assignment/ajaxSave',
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                var x = data;
                
                if (x.save)
                    alert("Data saved!");
                else
                    alert("Can't save data! Error occured!"+x.id);
            }
        });
    });
});

function loopChar(c, times) {
    var text = '';
    var i = 0;
    
    for (i=0; i<times; i++)
        text += c;
    
    return text;
}                    