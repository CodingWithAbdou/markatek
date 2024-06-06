<!DOCTYPE html>
@if(app()->getLocale() == 'ar')
    <html lang="en" dir="rtl" direction="rtl">
@else
    <html lang="ar">
@endif

@include('admin.layouts.head')

<body id="kt_body" class="bg-body">

@yield('content')

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('dashboard_assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard_assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->

@stack('script')

</body>
</html>
