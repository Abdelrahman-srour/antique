@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Items </h4>
            </div>
            <div class="col text-right">
                <a href="{{ route('admin.dashboard.items.create') }}" class="badge badge-dark">ADD+</a>
            </div>
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline text-center"
                        role="grid">
                        <thead>
                            <tr>
                                <th class="thead">Images</th>
                                <th class="thead">Specifications</th>
                                <th class="thead">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td >
                                        <img src="{{ asset($item->image_one) }}" width="70" height="70"
                                            alt="image">
                                        @if ($item->image_two)
                                            <img src="{{ asset($item->image_two) }}" width="70" height="70"
                                                alt="image">
                                        @endif
                                        @if ($item->image_three)
                                            <img src="{{ asset($item->image_three) }}" width="70" height="70"
                                                alt="image">
                                        @endif
                                        @if ($item->image_four)
                                            <img src="{{ asset($item->image_four) }}" width="70" height="70"
                                                alt="image">
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Title: </strong>{{ $item->title }} <br>
                                     <strong>Price: </strong>{{ $item->item_price }} <br>
                                     
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.items.edit', ['id' => $item->id]) }}"
                                            class="badge badge-info">UPDATE</a>
                                        <form style="display: inline;" method="POST"
                                            action="{{ route('admin.dashboard.items.destroy', ['id' => $item->id]) }}">
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
        </div>
    </div>
@endsection
