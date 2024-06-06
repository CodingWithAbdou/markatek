<script>
    $(document).on('change', '.dropzone_inputs', function (event){
        let input = document.getElementById($(this).attr('id'));
        let html = '';
        $.each(input.files, function(index, value) {
            html +=
                '<div class="dropzone-item dz-processing dz-image-preview dz-success dz-complete">'+
                '<div class="dropzone-file">' +
                '<div class="dropzone-filename">' +
                '<span>'+value.name+'</span>' +
                '</div>' +
                '</div>' +
                '<div class="dropzone-toolbar">' +
                '</div>' +
                '</div>';
        });
        $(this).parent().find('.dropzone-items').html(html);
    });
    function deleteUpload(id , data){
        Swal.fire({
            title: '{{__('dash.are_you_sure_delete')}}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3699FF',
            cancelButtonColor: '#F64E60',
            confirmButtonText: '{{__('dash.confirm_delete')}}',
            cancelButtonText: '{{__('dash.no_cancel')}}'
        }).then((result) => {
            if (result.value) {
                $.ajax('{{route('dashboard.' . $model->route_key .  '.uploads.remove')}}',{
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    data: {
                        'id': id,
                        "keyfile" : data
                    },
                    success: function (data, status) {
                        $('#attachment-'+id).remove();
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                    }
                });
            }
        })
    }
</script>
