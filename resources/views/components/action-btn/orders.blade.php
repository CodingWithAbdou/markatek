<td>
    <button data-bs-toggle="modal" data-bs-target="#message-modal-{{ $record->id }}"
        class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 my-1">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="{{ __('dash.message') }}">
            <span class="svg-icon svg-icon-3">
                <i class="fas fa-eye"></i>
            </span>
        </div>
    </button>
    <div class="modal fade" tabindex="-1" id="message-modal-{{ $record->id }}">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('dash.order_info') }}</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr class="text-start text-dark fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">{{ __('dash.input') }}</th>
                                <th class="min-w-100px">{{ __('dash.value') }}</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-800">
                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.payment_status') }}</td>
                                <td>
                                    <div
                                        class="badge badge-light-{{ $record->payment_status == 'paid' ? 'success' : 'danger' }}">
                                        @if ($record->payment_status == 'paid')
                                            {{ __('dash.paid') }}
                                        @else
                                            {{ __('dash.unpaid') }}
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.status') }}</td>
                                <td>
                                    <div
                                        class="badge badge-light-{{ $record->status == 'pending' ? 'warning' : ($record->status == 'processing' ? 'primary' : ($record->status == 'completed' ? 'success' : 'danger')) }}">

                                        @if ($record->status == 'pending')
                                            {{ __('dash.pending') }}
                                        @elseif($record->status == 'processing')
                                            {{ __('dash.processing') }}
                                        @elseif($record->status == 'completed')
                                            {{ __('dash.completed') }}
                                        @else
                                            {{ __('dash.cancelled') }}
                                        @endif

                                    </div>
                                </td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.unique_id') }}</td>
                                <td>{{ $record->InvoiceId }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.PaymentId') }}</td>
                                <td>{{ $record->PaymentId }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.TransactionDate') }}</td>
                                <td>{{ $record->TransactionDate }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.country') }}</td>
                                <td>{{ $record->country }}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.phone') }}</td>
                                <td>{{ $record->phone }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.name') }}</td>
                                <td>{{ $record->name }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.email') }}</td>
                                <td>{{ $record->email }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.place') }}</td>
                                <td>{{ App\Models\Place::find($record->place_id)->{'name_' . getLocale()} }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.piece') }}</td>
                                <td>{{ $record->piece }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.street') }}</td>
                                <td>{{ $record->street }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.avenue') }}</td>
                                <td>{{ $record->avenue }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.house_number') }}</td>
                                <td>{{ $record->house_number }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.products') }} </td>
                                <td>
                                    @foreach ($record->products as $product)
                                        <p>{{ $product->{'name_' . getLocale()} }} x {{ $product->pivot->quantity }}
                                        </p>
                                    @endforeach
                                </td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.payment_method') }}</td>
                                <td>{{ $record->payment_method == 'knet' ? __('front.knet') : __('front.visa_and_mastercard') }}
                                </td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.real_cost') }}</td>
                                <td>{{ $record->real_cost }} {{ __('dash.kwd') }}</td>
                            </tr>

                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.coupon') }}</td>
                                <td>{{ $record->coupon }}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.coupon_discount') }}</td>
                                <td>{{ $record->coupon_discount }} %</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.delivery_cost') }}</td>
                                <td>{{ $record->delivery_cost }} {{ __('dash.kwd') }}</td>
                            </tr>
                            <tr class="p-4">
                                <td class="ps-3">{{ __('dash.total_cost') }} </td>
                                <td>{{ $record->total_cost }} {{ __('dash.kwd') }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @if ($record->payment_status == 'paid') --}}
    <a href="{{ route('dashboard.orders.edit', $record) }}"
        class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="{{ __('dash.edit') }}">
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3"
                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                    fill="black" />
                <path
                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                    fill="black" />
            </svg>
        </span>
    </a>
    {{-- @endif --}}
    <a class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn"
        data-url="{{ route('dashboard.orders.destroy', $record) }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
        title="{{ __('dash.delete') }}">
        <span class="text">
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                        fill="black" />
                    <path opacity="0.5"
                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                        fill="black" />
                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                        fill="black" />
                </svg>
            </span>
        </span>
        <span class="btn-loader d-none"><i class="fas fa-circle-notch fa-spin p-0"></i></span>
    </a>
</td>
