<div class="{{ isset($col) ? 'col-md-' . $col : 'col-md-6' }} mb-10">
    <label class="form-label {{ isset($required) ? 'required' : '' }}">{{ $label }}</label>
    <input type="number" name="{{ $name }}" id="{{ $name }}" min="0" step="0.001"
        class="form-control form-control-solid " placeholder="{{ __('dash.enter') }} {{ $label }}" maxlength="70"
        value="{{ isset($data) ? old($name, $data) : old($name) }}" />
    {{-- @isset($hint)<div class="text-muted fs-7">{{$hint}}</div>@endif --}}
</div>
