<div class="{{ isset($col) ? 'col-md-' . $col : 'col-md-6' }} mb-10">
    <label class="form-label {{ isset($required) ? 'required' : '' }}">{{ $label }}</label>
    <input type="date" name="{{ $name }}" id="{{ $name }}" class="form-control form-control-solid"
        value="{{ isset($data) ? $data : '' }}">
</div>
