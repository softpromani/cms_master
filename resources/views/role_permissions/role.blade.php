@extends('layout.main')
@section('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endsection
@section('content')
    <h3>Roles List</h3>
    <p class="mb-2">
        A role provided access to predefined menus and features so that depending <br />
        on assigned role an administrator can have access to what he need
    </p>

    <!-- Role cards -->
    <div class="row">
        @foreach ($roles as $role)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>Total 4 users</span>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{ asset('app-assets/images/avatars/2.png') }}"
                                    alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                title="Allen Rieske" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{ asset('app-assets/images/avatars/12.png') }}"
                                    alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                title="Julee Rossignol" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{ asset('app-assets/images/avatars/6.png') }}"
                                    alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{ asset('app-assets/images/avatars/11.png') }}"
                                    alt="Avatar" />
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{$role->name??''}}</h4>
                            <a href="javascript:;" class="role-edit-modal"  data-id="{{$role->id??''}}" data-name="{{$role->name??''}}">
                                <small class="fw-bolder">Edit Role</small>
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="text-body"><i data-feather="copy"
                                class="font-medium-5"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end justify-content-center h-100">
                            <img src="{{ asset('app-assets/images/illustration/faq-illustrations.svg') }}"
                                class="img-fluid mt-2" alt="Image" width="85" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="stretched-link text-nowrap add-new-role">
                                <span class="btn btn-primary mb-1">Add New Role</span>
                            </a>
                            <p class="mb-0">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Role cards -->

    <h3 class="mt-50">Total users with their roles</h3>
    <p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
    <!-- table -->
    <div class="card">
        <div class="table-responsive">
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th>{{$role->name??''}}</th>
                        <th>{{ optional($role->created_at)->format('j F Y') }}</th>
                        <th>
                            <a href="#" target="" rel="noopener noreferrer"><i data-feather='trash-2'></i></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- table -->
    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 pb-5">
                    <div class="text-center mb-4">
                        <h1 class="role-title">Add New Role</h1>
                        <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row" action="{{ route('role.permissions') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" name="modalRoleName" class="form-control"
                                placeholder="Enter role name" tabindex="-1" data-msg="Please enter role name" />
                        </div>
                        <div class="col-12">
                            <h4 class="mt-2 pt-50">Role Permissions</h4>
                            <!-- Permission table -->
                            <div class="row">
                                @foreach ($permissions as $key => $permission)
                                    <div class="col-md-6">
                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input" type="checkbox" name="permission[]"
                                                value="{{ $permission->name ?? '' }}" id="userManagementRead{{$key}}" />
                                            <label class="form-check-label"
                                                for="userManagementRead{{$key}}">{{ $permission->name ?? '' }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Discard
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->
    <!-- Edit Role Modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5 pb-5">
                    <div class="text-center mb-4">
                        <h1 class="role-title">Edit Role</h1>
                        <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="editRoleName" class="row" action="{{ route('role.permissions') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="editRoleName">Role Name</label>
                            <input type="text" id="edit_name" name="modalRoleName" value="" class="form-control"
                                placeholder="Enter role name" tabindex="-1" data-msg="Please enter role name" />
                        </div>
                        <input type="hidden" id="data_id" name="roleId" value="">
                        <div class="col-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary me-1">Update</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Discard
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit Role Modal -->
@endsection
@section('script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/modal-add-role.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-access-roles.js') }}"></script>
    <!-- END: Page JS-->
@endsection
