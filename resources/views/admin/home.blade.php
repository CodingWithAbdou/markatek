@extends('admin.layouts.main')

@section('title')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('dash.home') }}</h1>
    <span class="h-20px border-gray-300 border-start mx-4"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-dark">{{ __('dash.home') }}</li>
    </ul>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ __('') }}
        </div>
    @endif
    <!-- Your content here -->
@endsection
