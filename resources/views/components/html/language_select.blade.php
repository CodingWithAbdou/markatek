@if($model->multi_language)
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>{{__('dash.Language')}}</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="locale" id="locale">
                @foreach(\App\Models\Language::all() as $lang)
                    <option value="{{$lang->name}}" {{app()->getLocale()==$lang->name?'selected':''}}>{{$lang->fullname}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
