@extends('layout.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('content')
    <!-- Select2 Start  -->
    <section class="basic-select2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create User</h4>
                    </div>
                    <form action="{{ route('register.user') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-4 mb-1">
                                    <label class="form-label" for="select2-basic">Roles</label>
                                    <select class="select2 form-select" name="role[]" multiple id="multiselect">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name ?? '' }}">{{ $role->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label class="form-label" for="select2-basic">Portals</label>
                                    <select class="select2 form-select" name="portals[]" multiple id="multiselect2">
                                        @foreach ($portals as $portal)
                                            <option value="{{ $portal->id ?? '' }}">{{ $portal->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('portals')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label class="form-label" for="first-name-vertical">First Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="First Name">
                                    @error('fname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="middle-name-vertical">Middle Name</label>
                                    <input type="text" id="middle-name-vertical" class="form-control" name="mname"
                                        placeholder="Middle Name">
                                    @error('mname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="last-name-vertical">Last Name</label>
                                    <input type="text" id="last-name-vertical" class="form-control" name="lname"
                                        placeholder="Last Name">
                                    @error('lname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="email-vertical">Email</label>
                                    <input type="email" id="email-vertical" class="form-control" name="email"
                                        placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="phone-vertical">Phone No</label>
                                    <input type="tel" id="phone-vertical" class="form-control" name="phone"
                                        placeholder="Phone No">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="alternate-phone-vertical">Alternate Phone No</label>
                                    <input type="tel" id="alternate-phone-vertical" class="form-control" name="aphone"
                                        placeholder="Alternate Phone No">
                                    @error('aphone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="dob">D.O.B</label>
                                    <input type="date" id="dob" class="form-control" name="dob">
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">Country</label>
                                    <select class="select2 form-select" name="country" id="select2-basic">
                                        <option value="1">India</option>
                                        <option value="2">Nepal</option>
                                        <option value="3">United Kingdome</option>
                                        <option value="4">United State</option>
                                    </select>
                                    @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">State</label>
                                    <select class="select2 form-select" name="state" id="select2-basic">
                                        <option value="1">Uttar Pradesh</option>
                                        <option value="2">Rajasthan</option>
                                        <option value="3">Uttrakhand</option>
                                    </select>
                                    @error('state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">City</label>
                                    <select class="select2 form-select" name="city" id="select2-basic">
                                        <option value="1">Pennsylvania</option>
                                        <option value="2">Rhode Island</option>
                                    </select>
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="pincode">Pincode</label>
                                    <input type="number" id="pincode" class="form-control" name="pincode">
                                    @error('pincode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="exampleFormControlTextarea1">Address 1</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="address1" rows="3"
                                            placeholder="Textarea"></textarea>
                                        @error('address1')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="exampleFormControlTextarea1">Address 2</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="address2" rows="3"
                                            placeholder="Textarea"></textarea>
                                        @error('address2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
    <!-- Select2 End -->
@endsection
@section('script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select3.js') }}"></script>
@endsection
