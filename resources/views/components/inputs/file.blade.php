<div class="{{isset($col)?'col-md-'.$col:'col-md-6'}} mb-10">
    <label class="form-label {{isset($required)?'required':''}}">{{$label}}</label>
    <div>
        <input type="file" class="dropzone_inputs" id="{{$name}}" name="{{$name}}" accept="{{$accept}}" hidden>
        <div class="dropzone dropzone-queue dz-max-files-reached mb-2 text-start" id="dropzone_file">
            <!--begin::Controls-->
            <div class="dropzone-panel mb-lg-0 mb-2">
                <label class="dropzone-select btn btn-sm btn-primary me-2" for="{{$name}}">{{ __('Attach files')  }}</label>
            </div>
            <!--end::Controls-->

            <!--begin::Items-->
            <div class="dropzone-items wm-200px">
                @if(isset($file) && $file)
                    <div class="dropzone-item dz-processing dz-success dz-complete" id="attachment-{{$key}}">
                        <!--begin::File-->
                        <div class="dropzone-file">
                            <a href="{{asset($file)}}" class="dropzone-filename" download="{{$fileName}}">
                                <span>{{$fileName}}</span>
                            </a>
                        </div>
                        <!--end::File-->
                        @if(!isset($required))
                            <div class="dropzone-toolbar">
                                <span class="dropzone-delete" onclick="deleteUpload('{{$key}}' , '{{$data??''}}')"><i class="bi bi-x fs-1"></i></span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <!--end::Items-->
        </div>
    </div>
    @isset($hint)<div class="text-muted fs-7">{{$hint}}</div>@endif
</div>

