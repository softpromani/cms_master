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
                      @dd($portal,$portal_user,$user_role,$user_permissions);
                </div>
            </div>
        </div>
    </section>
@endsection
