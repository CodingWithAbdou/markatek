@extends('admin.layouts.main')

@section('title')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        {{ $model->{'title_' . app()->getLocale()} }}</h1>
    <span class="h-20px border-gray-300 border-start mx-4"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard.home') }}" class="text-muted text-hover-primary">{{ __('dash.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ $model->{'title_' . app()->getLocale()} }}</li>
    </ul>
@endsection

@section('content')
    <form class="form" method="POST" action="{{ route('dashboard.settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="card setting-card">
            <div class="card-header card-header-stretch overflow-auto">
                <!--begin::Tabs-->
                <ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap" role="tablist"
                    id="kt_layout_builder_tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#basic"
                            role="tab">{{ __('dash.Basic') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#contact"
                            role="tab">{{ __('dash.Contact Information') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#social"
                            role="tab">{{ __('dash.Social Media') }}</a>
                    </li>
                    @if (count($setting->where('category', 5)) > 0)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#services"
                                role="tab">{{ __('dash.online services') }}</a>
                        </li>
                    @endif
                    @if (count($setting->where('category', 4)) > 0)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#other"
                                role="tab">{{ __('dash.Other') }}</a>
                        </li>
                    @endif
                </ul>
                <!--end::Tabs-->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-content pt-3">
                    <!--begin::Tab pane-->
                    <div class="tab-pane active" id="basic">
                        @foreach ($setting->where('category', 1) as $data)
                            @if ($data->type_id == 1)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'tr')
                                            "TR"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <input type="text" class="form-control form-control-solid"
                                            name="{{ $data->setting_key }}" id="{{ $data->setting_key }}"
                                            value="{{ $data->setting_value }}" autocomplete="off">
                                    </div>
                                </div>
                            @elseif($data->type_id == 3)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'tr')
                                            "TR"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <textarea class="form-control form-control-solid" name="{{ $data->setting_key }}" rows="4"
                                            id="{{ $data->setting_key }}" data-kt-autosize="true" maxlength="{{ $data->max }}">{{ $data->setting_value }}</textarea>
                                    </div>
                                </div>
                            @elseif($data->type_id == 2)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'tr')
                                            "TR"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <div class="image-input image-input-empty image-input-outline mb-3"
                                            data-kt-image-input="true"
                                            style="background-image: url({{ asset($data->setting_value) ? '' : asset('dashboard_assets/media/svg/files/blank-image.svg') }})">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-150px h-150px"
                                                style="background-image: url({{ asset($data->setting_value) ?? asset('dashboard_assets/media/svg/files/blank-image.svg') }}">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <!--begin::Icon-->
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--end::Icon-->
                                                <!--begin::Inputs-->
                                                <input type="file" name="{{ $data->setting_key }}"
                                                    id="{{ $data->setting_key }}" accept="{{ acceptImageType() }}" />
                                                <input type="hidden" name="avatar_remove" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if ($data->setting_key == 'pdf_file')
                                    <div class="row mb-10 align-items-center">
                                        <label
                                            class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                            @if (last(explode('_', $data->setting_key)) == 'ar')
                                                "AR"
                                            @elseif(last(explode('_', $data->setting_key)) == 'en')
                                                "EN"
                                            @else
                                            @endif
                                        </label>
                                        <div class="col-lg-9 col-xl-4">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="{{ $data->setting_key }}"
                                                        class="btn btn-sm btn-primary me-2">{{ __('dash.Attach file') }}</label>
                                                    <input type="file" hidden class="form-control form-control-solid"
                                                        onchange="loadFile(this)" name="{{ $data->setting_key }}"
                                                        id="{{ $data->setting_key }}" accept=".pdf">
                                                    <button type="button"
                                                        class="btn btn-active-color-danger btn-sm p-0 file_remove"><i
                                                            class="fas fa-times"></i></button>
                                                </div>
                                                <div class="col-auto">
                                                    <span class="file_name_span">{{ $data->setting_value }}</span>
                                                    <input type="text"
                                                        class="form-control form-control-solid file_name" hidden
                                                        value="{{ $data->setting_value }}"
                                                        name="{{ $data->setting_key }}_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane" id="contact">
                        @foreach ($setting->where('category', 2) as $data)
                            @if ($data->type_id == 1)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <input type="text" class="form-control form-control-solid ltr"
                                            name="{{ $data->setting_key }}" id="{{ $data->setting_key }}"
                                            value="{{ $data->setting_value }}" autocomplete="off">
                                    </div>
                                </div>
                            @elseif($data->type_id == 3)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <textarea class="form-control form-control-solid" name="{{ $data->setting_key }}" rows="5"
                                            id="{{ $data->setting_key }}" data-kt-autosize="true">{{ $data->setting_value }}</textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane" id="social">
                        @foreach ($setting->where('category', 3) as $data)
                            @if ($data->type_id == 1)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <input type="text" class="form-control form-control-solid ltr"
                                            name="{{ $data->setting_key }}" id="{{ $data->setting_key }}"
                                            value="{{ $data->setting_value }}" autocomplete="off">
                                    </div>
                                </div>
                            @elseif($data->type_id == 3)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <textarea class="form-control form-control-solid" name="{{ $data->setting_key }}" rows="5"
                                            id="{{ $data->setting_key }}" data-kt-autosize="true">{{ $data->setting_value }}</textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane" id="other">
                        @foreach ($setting->where('category', 4) as $data)
                            @if ($data->type_id == 1)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <input type="text" class="form-control form-control-solid"
                                            name="{{ $data->setting_key }}" id="{{ $data->setting_key }}"
                                            value="{{ $data->setting_value }}" autocomplete="off">
                                    </div>
                                </div>
                            @elseif($data->type_id == 3)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <textarea class="form-control form-control-solid" name="{{ $data->setting_key }}" rows="5"
                                            id="{{ $data->setting_key }}" data-kt-autosize="true">{{ $data->setting_value }}</textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane" id="services">
                        @foreach ($setting->where('category', 5) as $data)
                            @if ($data->type_id == 1)
                                <div class="row mb-10">
                                    <label
                                        class="col-lg-3 col-form-label text-lg-end">{{ $data->{'title_' . app()->getLocale()} }}
                                        @if (last(explode('_', $data->setting_key)) == 'ar')
                                            "AR"
                                        @elseif(last(explode('_', $data->setting_key)) == 'en')
                                            "EN"
                                        @else
                                        @endif
                                    </label>
                                    <div class="col-lg-9 col-xl-4">
                                        <input type="text" class="form-control form-control-solid"
                                            name="{{ $data->setting_key }}" id="{{ $data->setting_key }}"
                                            value="{{ $data->setting_value }}" autocomplete="off">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer py-8">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        <button type="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                            <span class="indicator-label">{{ __('dash.save') }}</span>
                        </button>
                        <a href="{{ route('dashboard.home') }}" class="btn btn-active-light btn-color-muted">
                            <span class="indicator-label">{{ __('dash.cancel') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('style')
    <style>
        .image-input.image-input-outline .image-input-wrapper {
            background-size: contain;
            background-position: center;
        }
    </style>
@endpush

@push('script')
    <script>
        var loadFile = function(event) {
            attachFile = event.files[0];
            let filename = $(event).val().split('\\').pop();
            $(event).parent().parent().find('.file_name').val(filename);
            $(event).parent().parent().find('.file_name_span').html(filename);
        };
        $('.file_remove').on('click', function(e) {
            let elem = $(this).parent().parent();
            elem.find('input[type="file"]').val('');
            elem.find('.file_name').val('');
            elem.find('.file_name_span').html('');
        })
    </script>
@endpush
