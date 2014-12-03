$(document).ready(function() {
	$(document).on('click', '.row-remove', function() {
		$(this).parent().parent().remove();
		
		if ($('.row-data').length == 0)
			$('.no-data-row').show();
	});
	
	$('#btn-add').click(function() {
		var selectedPrivilege = $('#dummy_privilege').val();
		if ($.trim(selectedPrivilege) == '') {
			alert('Please select privilege!');
		}
		else {
			var found = false;
			
			$('.row-data').each(function(index) {
				var secondColumn = $(this).find('td:nth-child(2)').html();
				
				if (secondColumn == selectedPrivilege)
					found = true;
			});
			
			if (found) {
				alert('Privilege already added!');
			}
			else {
				$.getJSON(webroot + '/user/privilegeInfo/?name=' + selectedPrivilege, function(data) {
					var newEl = 
						"<tr class='row-data'>" +
							"<td style='vertical-align:middle;' style='width: 50px;'>" +
								"<a href='javascript:void(0);' class='row-remove'><span class='glyphicon glyphicon-remove'></span></a>" +
								"<input type='hidden' name='UserPrivilege[" + rowCounter + "][privilege]' value='" + selectedPrivilege + "'/>" +
								"<input type='hidden' name='UserPrivilege[" + rowCounter + "][description]' value='" + data.description + "'/>" +
							"</td>" +
							"<td>" + data.name + "</td>" +
							"<td>" + data.description + "</td>" +
							"<td><div></div></td>" +
						"</tr>";

					rowCounter++;
					$('.no-data-row').hide();
					$('.no-data-row').before(newEl);
				});
			}
		}
	});
	
	$('#btn-remove-all').click(function() {
		$('.row-data').remove();
		
		if ($('.row-data').length == 0)
			$('.no-data-row').show();
	});
    
    $('#change_pic').click(function() {
		$('#change_pic').hide();
        $('#choose_pic').show();
	});
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#picture')
                .attr('src', e.target.result)
                .width(250);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
