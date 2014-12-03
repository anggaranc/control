(function(){
	$(document).on('change', 'select.as-select', function(){
		$(this).parent().next().find('input').attr('name', 
			$(this).attr('data-model-name') + '[' + $(this).val() + ']');
	});

	$(document).on('click', '.as-plus', function(){
		var parentTr = $(this).parent().parent();

		parentTr.after(parentTr.clone());
		parentTr.next().find('input.as-input').attr('value', '');
	});

	$(document).on('click', '.as-remove', function(){
		var parentTr = $(this).parent().parent();

		if (!(parentTr.next().hasClass('as-list-footer') && parentTr.prev().length === 0))
			$(this).parent().parent().remove();
		else
			$(this).parent().prev().find('input').attr('value', '');
	});

	$(document).on('click', '.as-btn-submit', function(){
		var form = $(this).parent().parent();
		var target = $('#' + form.parent().attr('data-target'));

		target.yiiGridView('update', {
			data: form.serialize()
		});

		return false;
	});
}());