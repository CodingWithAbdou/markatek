<div class="{{isset($col)?'col-md-'.$col:'col-md-6'}} mb-10">
    <label class="form-check form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" name="{{$name}}" id="{{$name}}" value="1" {{isset($data)?$data==1?'checked':'':''}}/>
        <span class="form-check-label">{{$label}}</span>
    </label>
    @isset($hint)<div class="text-muted fs-7">{{$hint}}</div>@endif
</div>

