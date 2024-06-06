<td>
    <button data-bs-toggle="modal" data-bs-target="#message-modal-{{$record->id}}"
            class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 my-1">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center"
             data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('dash.message')}}">
            <span class="svg-icon svg-icon-3">
                <i class="fas fa-eye"></i>
            </span>
        </div>
    </button>
    <div class="modal fade" tabindex="-1" id="message-modal-{{$record->id}}">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('front.Job Application')}}</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <table class="table table-striped" >
                        <thead class="thead-dark">
                        <tr class="text-start text-dark fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">{{__('dash.input')}}</th>
                            <th class="min-w-100px">{{__('dash.value')}}</th>
                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-800">
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.image')}}</td>
                                <td><a download href="{{asset($record->image)}}"  type="button" class="btn btn-outline-success">{{__('dash.download')}}</a></td>
                              </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.position')}}</td>
                                <td>{{$record->position}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.Full Name')}}</td>
                                <td>{{$record->full_name}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.address')}}</td>
                                <td>{{$record->address}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.mobile')}}</td>
                                <td>{{$record->mobile}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.place_of_birth')}}</td>
                                <td>{{$record->place_of_birth}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.date_of_birth')}}</td>
                                <td>{{$record->date_of_birth}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.gender')}}</td>
                                <td>{{$record->date_of_birth}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.passport_no')}}</td>
                                <td>{{$record->passport_no}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.marital_status')}}</td>
                                <td>{{$record->marital_status}}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.has_suffer')}}</td>
                                <td>{{$record->has_suffer == "1" ? __('front.Yes') : __('front.No') }} </td>
                            </tr>
                            @if($record->has_suffer == '1')
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.desc_suffer')}}</td>
                                <td>{{$record->desc_suffer}}</td>
                            </tr>
                            @endif
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.has_allergy')}}</td>
                                <td>{{$record->has_allergy  == "1" ? __('front.Yes') : __('front.No') }}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('dash.smoke')}}</td>
                                <td>{{$record->smoke  == "1" ? __('front.Yes') : __('front.No') }}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{__('front.Languages')}}</td>
                                <td>
                                    @foreach($record->languages as $lang)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <hr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{ __('front.Language') }}</th>
                                            <td>{{ $lang->language }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Reading') }}</th>
                                            <td>@if ($lang->reading == 0)  {{ __('front.Weak') }} @elseif ($lang->reading == 1)  {{ __('front.Good') }}  @else  {{ __('front.Excellent') }} @endif</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Writing') }}</th>
                                            <td>@if ($lang->writing == 0)  {{ __('front.Weak') }} @elseif ($lang->writing == 1)  {{ __('front.Good') }}  @else  {{ __('front.Excellent') }} @endif</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Speaking') }}</th>
                                            <td>@if ($lang->speaking == 0)  {{ __('front.Weak') }} @elseif ($lang->speaking == 1)  {{ __('front.Good') }}  @else  {{ __('front.Excellent') }} @endif</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">{{__('front.Educational Background')}}</td>
                                <td>
                                    @foreach($record->universities as $univ)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <hr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{ __('front.Degree') }}</th>
                                            <td>{{ $univ->degree }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Specialization') }}</th>
                                            <td>{{ $univ->degree_specialization }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.University / School') }}</th>
                                            <td>{{ $univ->degree_university }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Graduation Year') }}</th>
                                            <td>{{ $univ->degree_date }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">{{__('front.Computer Programs')}}</td>
                                <td>
                                    @foreach($record->computerSkill as $skill)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <hr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{ __('dash.name') }}</th>
                                            <td>{{ $skill->name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.experience') }}</th>
                                            <td>@if ($skill->Experience == 0)  {{ __('front.Weak') }} @elseif ($skill->Experience == 1)  {{ __('front.Good') }}  @else  {{ __('front.Excellent') }} @endif</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">{{__('front.Training Courses')}}</td>
                                <td>
                                    @foreach($record->trainings as $course)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <hr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{ __('front.Courses Names') }}</th>
                                            <td>{{ $course->name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Training Institute') }}</th>
                                            <td>{{ $course->training_institute }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Period') }}</th>
                                            <td>{{ $course->Period }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">{{__('front.Work Experience')}}</td>
                                <td>
                                    @foreach($record->experiences as $exp)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <hr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{ __('front.Name') }}</th>
                                            <td>{{ $exp->company_name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('dash.address') }}</th>
                                            <td>{{ $exp->company_address }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Tel.Number') }}</th>
                                            <td>{{ $exp->company_tel }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Salary') }} {{ __('front.From') }}</th>
                                            <td>{{ $exp->salary_start }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Salary') }} {{ __('front.End') }}</th>
                                            <td>{{ $exp->salary_end }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Recruitment period') }} {{ __('front.From') }}</th>
                                            <td>{{ $exp->period_from }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Recruitment period') }} {{ __('front.To') }}</th>
                                            <td>{{ $exp->period_to }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">{{ __('front.Reason for leaving') }}</th>
                                            <td>{{ $exp->reason_for_leaving }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @can('admin.contacts.delete') --}}
        <a class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn" data-url="{{route('dashboard.career.delete', $record)}}"
        {{-- <a class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn" data-url="#" --}}
            data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{__('dash.delete')}}">
            <span class="text">
                <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                </svg>
            </span>
            </span>
            <span class="btn-loader d-none"><i class="fas fa-circle-notch fa-spin p-0"></i></span>
        </a>
    {{-- @endcan --}}
</td>
