@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Admins Roles</h4>
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
                                <th class="thead ">Phone</th>
                                <th class="thead ">Email</th>
                                <th class="thead ">Title</th>
                                <th class="thead ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->admin)
                                        <td>{{ $user->admin->title }}</td>
                                    @endif
                                    <td>
                                        @if ($user->is_admin == 2)
                                            <form style="display: inline;" method="POST"
                                                action="{{ route('admin.dashboard.users.updateModerator', $user->id) }}">
                                                @method('put')
                                                @csrf
                                                <button style="border: 0px;" type="submit"
                                                    class="badge badge-outline ">MAKE MODERATOR</button>
                                            </form>
                                        @elseif ($user->is_admin == 3)
                                            <form style="display: inline;" method="POST"
                                                action="{{ route('admin.dashboard.users.updateAdmin', $user->id) }}">
                                                @method('put')
                                                @csrf
                                                <button style="border: 0px;" type="submit"
                                                    class="badge badge-outline ">MAKE ADMIN</button>
                                            </form>
                                        @endif
                                        @if ($user->is_admin != 1)
                                            <form style="display: inline;" method="POST"
                                                action="{{ route('admin.dashboard.admins.update', $user->id) }}">
                                                @method('put')
                                                @csrf
                                                <button style="border: 0px;" type="submit"
                                                    class="btn btn-sm btn-outline-danger ">REMOVE</button>
                                            </form>
                                        @endif
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
