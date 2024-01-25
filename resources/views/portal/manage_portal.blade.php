@extends('layout.main')
@section('content')
    <h3>Portal List</h3>
    <p class="mb-2">
        A role provided access to predefined menus and features so that depending <br />
        on assigned role an administrator can have access to what he need
    </p>

    <!-- Role cards -->
    <div class="row">
        @foreach ($portals as $portal)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{ asset('storage/' . $portal->image) }}" alt="Meeting Pic" height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="my-auto">
                                <h4 class="card-title mb-25">{{ $portal->name ?? '' }}</h4>
                                <p class="card-text mb-0">{{ $portal->description ?? '' }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row meetings">
                            <div class="content-body">
                                <a href="{{ $portal->website_url ?? '' }}" target="_blank" class="card-link"><i data-feather="link"
                                        class="avatar-icon font-medium-3"></i> Website link</a>
                            </div>
                            <div class="content-body">
                                &nbsp;&nbsp;&nbsp; <a href="" class="card-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Portal Edit"><i data-feather="edit"
                                        class="avatar-icon font-medium-3"></i></a>
                            </div>
                        </div>
                        <div class="avatar-group">
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Billy Hopkins" class="avatar pull-up">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-9.jpg') }}" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Amy Carson" class="avatar pull-up">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Brandon Miles" class="avatar pull-up">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Daisy Weber" class="avatar pull-up">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-20.jpg') }}" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                title="Jenny Looper" class="avatar pull-up">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-20.jpg') }}" alt="Avatar"
                                    width="33" height="33" />
                            </div>
                            <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
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
                            <a href="{{route('portal')}}" class="stretched-link text-nowrap add-new-role">
                                <span class="btn btn-primary mb-1">Add New Portal</span>
                            </a>
                            <p class="mb-0">Add Portal, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Role cards -->
@endsection
