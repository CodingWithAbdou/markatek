<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2 class="{{ isset($required) ? 'required' : '' }}">{{ $label }}</h2>
        </div>
    </div>
    <div class="card-body text-center pt-0 error-here">
        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true">
            <div class="image-input-wrapper w-150px h-150px {{ isset($class) ? $class : '' }}"
                style="background-size: cover; background-position: center; background-image: url({{ asset(isset($data) && $data ? $data : 'dashboard_assets/media/svg/files/blank-image.svg') }})">
            </div>

            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                title="{{ __('dash.change') }} {{ $label }}">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input type="file" name="{{ $name }}" id="{{ $name }}"
                    accept="{{ acceptImageType() }}" />
            </label>

            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                title="{{ __('dash.remove') }} {{ $label }}">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                title="{{ __('dash.remove') }} {{ $label }}">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Remove-->
        </div>
        <div class="text-muted fs-7">{{ __('dash.Allowed image types') }}: {{ acceptImageType() }}</div>
    </div>
</div>
