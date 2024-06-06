<script src="{{asset('dashboard_assets/plugins/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>

<script>
    let edtr = [];
    $('.editor').each(function(index) {
        let id = $(this).attr('id');
        tinymce.init({
            selector:'.editor',
            menubar: false,
            rtl: {{app()->getLocale()=='ar'?'true':'false'}},
            content_style: '{{app()->getLocale()=='ar'?'body{direction:rtl}':'false'}}',
            toolbar: [
                'preview fullscreen removeformat | ltr rtl | styles fontsize styleselec | bold italic underline strikethrough superscript subscript |' +
                '| outdent indent | align lineheight | bullist numlist | forecolor backcolor | hr'
            ],
            plugins : "directionality advlist autolink link image media lists preview  fullscreen",
            line_height_formats: '1 2 3 4 5 6 7 8 9',
            init_instance_callback: function(editor) {
                editor.on('change', function(e) {
                    let content = tinymce.get(id).getContent();
                    $('#'+id).val(content)
                });
            }
        });
    });
</script>
