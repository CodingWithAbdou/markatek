<div class="{{isset($col)?'col-md-'.$col:'col-md-6'}} mb-10">
    <label class="form-label {{isset($required)?'required':''}}">{{$label}}</label>
    <input type="password" name="{{$name}}" id="{{$name}}" class="form-control form-control-solid"
           placeholder="{{__('dash.enter')}} {{$label}}" maxlength="70" />
    @isset($hint)<div class="text-muted fs-7">{{$hint}}</div>@endif
</div>
