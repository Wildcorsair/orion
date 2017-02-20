;(function($) {

    $(document).ready(function() {
        
        $('#create-post-form').parsley();

        $('input[name="title"]').attr({
            "required": "",
            "data-parsley-maxlength": "255"
        });

        $('#select-tags').select2();

        tinymce.init({ 
            selector: 'textarea',
            menubar: false
        });

    });

})(jQuery);