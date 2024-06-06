<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('dashboard_assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard_assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<script>
    const SwalModal = (title ,type ,url) => {
        swal.fire({
            title: title,
            icon: type,
            confirmButtonText: '{{__('dash.ok')}}',
            confirmButtonColor: '#00a39a',
        }).then(function (){
            if (url)
                window.location = url;
        });
    };
</script>
@stack('script')
