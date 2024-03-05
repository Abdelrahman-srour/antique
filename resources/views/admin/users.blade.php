@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Registered users</h4>
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
                                <th class="thead ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{-- <a class="text-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-info-circle"></i>
                            </a>
                            <form style="display: inline;" method="POST"
                                action="{{ route('admin.dashboard.users.updateOwner', $user->id) }}">
                                @method('put')
                                @csrf
                                <button style="border: 0px;" type="submit" class="badge badge-outline mr-2">MAKE OWNER
                                </button>
                            </form> --}}
                                        <form style="display: inline;" method="POST"
                                            action="{{ route('admin.dashboard.users.updateAdmin', $user->id) }}">
                                            @method('put')
                                            @csrf
                                            <button style="border: 0px;" type="submit"
                                                class="badge badge-outline mr-2">MAKE
                                                ADMIN</button>
                                        </form>
                                        <form style="display: inline;" method="POST"
                                            action="{{ route('admin.dashboard.users.updateModerator', $user->id) }}">
                                            @method('put')
                                            @csrf
                                            <button style="border: 0px;" type="submit"
                                                class="badge badge-outline mr-2">MAKE
                                                MODERATOR</button>
                                        </form>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Caution!
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-uppercase">
                                                        Owners account can access all dashboard data and control admins
                                                        rules
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
