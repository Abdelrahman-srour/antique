@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Coupons Manger </h4>
            </div>
            <div class="col text-right">
                <a href="{{ route('admin.dashboard.coupons.create') }}" class="badge badge-dark">ADD+</a>
            </div>
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table
                        class="data-table table stripe hover nowrap dataTable no-footer dtr-inline  text-center" role="grid">
                        <thead>
                            <tr>
                                <th class="thead ">Coupon Code</th>
                                {{-- <th class="thead ">Categories</th> --}}
                                <th class="thead ">Amount</th>
                                <th class="thead ">Created at</th>
                                <th class="thead ">Exp date</th>
                                <th class="thead ">Status</th>
                                <th class="thead ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    {{-- <td>{{ $coupon->coupon_code }}</td> --}}
                                    <td>{{ $coupon->amount }}
                                        @if ($coupon->coupon_type === 1)
                                        EGP
                                        @elseif($coupon->coupon_type === 2)
                                        %
                                        @endif
                                    </td>

                                    <td>{{ date('Y-m-d', strtotime($coupon->created_at)) }}</td>
                                    <td>{{ $coupon->expiry_date }}</td>

                                    @if ($coupon->status == 1)
                                        <td>
                                            <div class="badge badge-outline-secondary">ACTIVATED</div>
                                            <form style="display: inline;" method="POST"
                                                action="{{ route('admin.dashboard.coupon.disable', ['id' => $coupon->id]) }}">
                                                @method('put')
                                                @csrf
                                                <button style="border: 0px;" type="submit"
                                                    class="badge badge-secondary">Disable</button>
                                            </form>
                                        </td>
                                    @endif
                                    @if ($coupon->status == 0)
                                        <td>
                                            <div class="badge badge-outline-secondary">DISABLED</div>
                                            <form style="display: inline;" method="POST"
                                                action="{{ route('admin.dashboard.coupon.enable', ['id' => $coupon->id]) }}">
                                                @method('put')
                                                @csrf
                                                <button style="border: 0px;" type="submit"
                                                    class="badge badge-success">Enable</button>
                                            </form>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.dashboard.coupon.update', ['id' => $coupon->id]) }}"
                                            class="badge badge-info">UPDATE</a>
                                        <form style="display: inline;" method="POST"
                                            action="{{ route('admin.dashboard.coupon.destroy', ['id' => $coupon->id]) }}">
                                            @method('delete')
                                            @csrf
                                            <button style="border: 0px;" type="submit"
                                                class="badge badge-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">1-10 of
                        12 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                                    href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                    class="page-link"><i class="ion-chevron-left"></i></a></li>
                            <li class="paginate_button page-item active"><a href="#"
                                    aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                    class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                    aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link"><i
                                        class="ion-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
