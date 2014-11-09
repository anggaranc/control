$(document).ready(function() {
	$('div.as-show-hide').click(function() {
		$('#' + $(this).attr('data-target')).toggle();
	});
});

function render(el) {
	var parentTr = el.parent().parent();
	var primaryKey = parentTr.attr('id');
	var authItemName = el.parent().next().html();
	var nextTr = parentTr.next();
	
	if (nextTr.length === 0)
		fetch(primaryKey, parentTr, 'after');
	else {
		if (!nextTr.hasClass('sub-view')) {
			fetch(primaryKey, nextTr, 'before');
		}
		else {
			if (!nextTr.is(':visible'))
				nextTr.show();
			else
				nextTr.hide();
		}
	}
}

function fetch(primaryKey, target, type) {
	$.ajax({
		url: webroot + '/user/subView/' + primaryKey,
		type: 'GET',
		success: function(data) {
			if (type === 'after')
				target.after(data);
			else
				target.before(data);
			
			$('#dt-user-' + primaryKey).dataTable({
				'bSort': true,
				'bFilter': true,
				'sPaginationType': 'full_numbers'
			});
		}
	});
}