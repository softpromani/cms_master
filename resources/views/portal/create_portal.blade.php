@extends('layout.main')
@section('content')
    <section class="basic-select2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <form action="{{ route('portal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-name">Portal Name</label>
                                    <input type="text" id="portal-name" class="form-control" name="portal_name"
                                       required placeholder="Portal Name">
                                    @error('portal_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-image">Portal Image</label>
                                    <input type="file" id="portal-image" class="form-control" name="portal_image">
                                    @error('portal_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-desc">Portal Desc</label>
                                    <input type="text" id="portal-desc" class="form-control" name="portal_desc"
                                       required placeholder="Portal Desc">
                                    @error('portal_desc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="url">Portal URL</label>
                                    <input type="url" id="url" class="form-control" name="url"
                                       required placeholder="https://www.abcd.com">
                                    @error('url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-desc">Portal Host</label>
                                    <input type="text" id="portal-host" class="form-control" name="portal_host"
                                       required placeholder="Portal host">
                                    @error('portal_host')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-desc">Portal Database</label>
                                    <input type="text" id="portal-database" class="form-control" name="portal_database"
                                       required placeholder="Portal database">
                                    @error('portal_database')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-desc">Portal Database Username</label>
                                    <input type="text" id="portal-username" class="form-control" name="portal_username"
                                       required placeholder="Portal username">
                                    @error('portal_username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="portal-desc">Portal Database Password</label>
                                    <input type="text" id="portal-password" class="form-control" name="portal_password"
                                       required placeholder="Portal password">
                                    @error('portal_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect waves-float waves-light"
                                type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
