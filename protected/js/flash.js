$(document).ready(function() {
	$('#flash-close-btn').on('click', function() {
		$(this).parent().parent().remove();
	});
});

function app_flash(options) {
	var flashEl = $('.flash');
	
	flashEl.hide();
	flashEl.find('.flash-success').remove();
	flashEl.find('.flash-error').remove();
	
	flashEl.html(
		"<div class='flash-" + options.type + "'>" +
			"<div class='pull-left'>" + options.text + "</div>" +
			"<div class='pull-left'>" +
				"<span class='padding-left-10'></span>" +
				"<a id='flash-close-btn' href='javascript:void(0);'><span class='glyphicon glyphicon-remove'></span></i></a>" +
			"</div>" +
		"</div>"
	);

	$('#flash-close-btn').on('click', function() {
		$(this).parent().parent().remove();
	});
	
	flashEl.show();
}
