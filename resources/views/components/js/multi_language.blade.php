<script>
    $('#locale').on('change', function (e) {
        $('.overlay_loader').css('display', 'flex');
        let action = '{{route('dashboard.translation.get', $model->route_key)}}';
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "GET",
            url: action,
            data: {
                'id': $('#id').val(),
                'lang': $('#locale').val(),
            },
            success: function (response) {
                if(response.status){
                    $.each(response.values, function(index, value) {
                        let isEditor = $('#'+index).hasClass('editor');
                        if(isEditor){
                            tinymce.get(index).setContent(value);
                        }else{
                            $('#'+index).val(value).change();
                        }
                    });
                }
                $('.overlay_loader').css('display', 'none');
            }
        });
    });
</script>
