@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Orders </h4>
            </div>

        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline " role="grid">
                        <thead>
                            <tr>
                                <th class="thead "style="color: #a7a9ac">ORDER NO</th>
                                <th class="thead "style="color: #a7a9ac">CONTACT</th>
                                <th class="thead "style="color: #a7a9ac">SHIPPING ADDRESS</th>
                                <th class="thead "style="color: #a7a9ac">ITEMS</th>
                                <th class="thead "style="color: #a7a9ac">ORDER TOTAL</th>
                                <th class="thead "style="color: #a7a9ac">ORDER DATE</th>
                                <th class="thead "style="color: #a7a9ac">PAYMENT METHOD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><strong>{{ $order->id }}</strong>|</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <strong>Name:</strong></span> {{ $order->first_name }}
                                                {{ $order->last_name }}
                                            </li>
                                            <li><strong>Phone:</strong></span> {{ $order->phone_no }}</li>
                                            @if ($order->phone_no2)
                                                <li><strong>Other Phone:</strong></span> {{ $order->phone_no2 }}</li>
                                            @endif
                                            <li> <strong>Email:</strong></span> {{ $order->user->email }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li><strong>City:</strong></span> {{ $order->city }}</li>
                                            <li> <strong>Region:</strong></span> {{ $order->Region }}</li>
                                            <li><strong>Address:</strong></span> {{ $order->shipping_address }}</li>
                                            <li><strong>Apartment/Suite/Building/Floor:</strong></span>
                                                {{ $order->Building }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($order->items as $orderItem)
                                                <li><span><strong>Title:</strong></span> {{ $orderItem->items->title }}
                                                </li>
                                                <li><span><strong>Category:</strong></span>
                                                    {{ $orderItem->items->categories->title }}
                                                </li>
                                                <li><span><strong>Quantity:</strong></span> {{ $orderItem->quantity }}</li>
                                                <li>
                                                    <span>
                                                        <strong>Size</strong>:</span>
                                                    @if ($orderItem->items->length)
                                                        {{ $orderItem->items->length }}
                                                        X
                                                    @endif
                                                    @if ($orderItem->items->width)
                                                        {{ $orderItem->items->width }}
                                                        cm
                                                    @endif
                                                    @if ($orderItem->items->sizes)
                                                        {{ $orderItem->items->sizes->size_value }}
                                                    @endif
                                                </li>
                                                <li><span><strong>Price:</strong></span>
                                                    {{ $formattedNumber = (int) $orderItem->items->item_price }} EGP
                                                </li> --------------------
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $formattedNumber = (int) $order->total_price }} EGP <br>
                                        <strong>Shipping: </strong> +{{ $shipping->value }} EGP <br>
                                        @if ($order->discount)
                                            <strong>Discount: </strong> -{{ $order->discount }} EGP
                                        @endif
                                    </td>

                                    <td>{{ $order->created_at }}</td>
                                    <td>Cash On Delivery</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
