;(function($) {
	$('#create-post-form').parsley();
	$('input[name="title"]').attr({
		"required": "",
		"data-parsley-maxlength": "4"
	});

})(jQuery);