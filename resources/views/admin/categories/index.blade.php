@extends('admin.layouts.main')

@section('title')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $model->{'title_' . app()->getLocale()} }}</h1>
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
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <x-table.search />
            </div>
            <div class="card-toolbar">
                <x-table.export />
                <x-table.item_order />
                <x-table.create />
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                <thead>
                    <tr class="text-start text-dark fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px no-sort">{{ __('dash.image') }}</th>
                        <th class="min-w-150px">{{ __('dash.name') }}</th>
                        <th class="min-w-150px">{{ __('dash.created_at') }}</th>
                        <th class="min-w-70px no-export">{{ __('dash.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-800">
                    @foreach ($data as $record)
                        \
                        <tr>
                            <td>
                                <div class="symbol symbol-50px bg-dark p-3"><img src="{{ asset($record->image_path) }}"
                                        alt="" class="object-cover"></div>
                            </td>
                            <td>{{ $record->{'name_' . getLocale()} }}</td>
                            <td>{{ $record->created_at }}</td>
                            <x-action-btn.categories :record="$record" />
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <x-js.datatables :data="$data" />
    <x-js.form />
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            let btn = $(this);
            Swal.fire({
                title: '{{ __('dash.are_you_sure_delete') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3699FF',
                cancelButtonColor: '#F64E60',
                confirmButtonText: '{{ __('dash.confirm_delete') }}',
                cancelButtonText: '{{ __('dash.no_cancel') }}'
            }).then((result) => {
                if (result.value) {
                    loaderStart(btn);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: btn.data('url'),
                        type: 'POST',
                        data: {
                            "_method": 'DELETE',
                        },
                        success: function(data) {
                            if (data.status) {
                                Dtable.row(btn.parents('tr')).remove().draw();
                                SwalModal(data.msg, 'success');
                            } else {
                                SwalModal(data.msg, 'error');
                                loaderEnd(btn);
                            }
                        },
                    });
                }
            })
        })
    </script>
@endpush
