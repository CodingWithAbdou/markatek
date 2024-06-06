<div class="{{isset($col)?'col-md-'.$col:'col-md-12'}} mb-10">
    <label class="form-label {{isset($required)?'required':''}}">{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" class="form-control form-control-solid {{isset($class)?$class:''}}" rows="5" data-kt-autosize="true"
              placeholder="{{__('dash.enter')}} {{$label}}" maxlength="500">{{isset($data) ?  old($name, $data) : old($name) }}</textarea>
    @isset($hint)<div class="text-muted fs-7">{{$hint}}</div>@endif
</div>

