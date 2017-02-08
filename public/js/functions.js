;(function($) {

	$('#create-post-form').parsley();

	$('input[name="title"]').attr({
		"required": "",
		"data-parsley-maxlength": "255"
	});

	$('#select-tags').select2();

})(jQuery);