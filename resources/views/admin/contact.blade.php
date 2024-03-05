@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Emails</h4>
            </div>
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline  text-center"
                        role="grid">
                        <thead>
                            <tr>
                                <th class="thead ">Name</th>
                                <th class="thead ">Email</th>
                                <th class="thead ">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $info)
                                <tr>
                                    <td>{{ $info->full_name }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
