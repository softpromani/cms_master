@extends('layout.main')
@section('content')
    <section class="basic-select2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create User</h4>
                        <div>
                            <a href="#" class="add-new-role">
                                <span class="btn btn-primary btn-sm btn-add-new waves-effect waves-float waves-light"> <i data-feather="plus"></i> user</span>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Portals</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            {{ $user->fname ?? ('' . ' ' . $user->mname ?? ('' . ' ' . $user->lname ?? '')) }}
                                        </th>
                                        <th scope="col">{{ $user->email ?? '' }}</th>
                                        <th scope="col">{{ $user->phone ?? '' }}</th>
                                        <th scope="col">
                                            @foreach ($user->roles as $role)
                                                @if ($role->name == 'User')
                                                    <span class="badge rounded-pill bg-light-primary">User</span>
                                                @elseif ($role->name == 'Admin')
                                                    <span class="badge rounded-pill bg-light-danger">Admin</span>
                                                @elseif ($role->name == 'Super Admin')
                                                    <span class="badge rounded-pill bg-light-success">Super Admin</span>
                                                @endif
                                            @endforeach
                                        </th>
                                        <th scope="col">
                                            <div class="">
                                                <button class="btn-icon btn btn-primary btn-round btn-sm " type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ $user->portals()->count() }}
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    @foreach ($user->portals() as $portal)
                                                    <a class="dropdown-item" href="{{route('portals.user.role',['portal_id' => $portal->id??'', 'user_id' => $user->id??''])}}">
                                                        <span class="align-middle">{{$portal->name??''}}</span>
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
