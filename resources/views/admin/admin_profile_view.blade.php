@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div>
            <div class="container-fluid">
                <div class="mt-4 page-header min-height-300 border-radius-xl"
                        style="background-image: url('../assets/img/bokeh/pexels-bokeh.jpeg'); background-position-y: 50%;">

                <span class="mask bg-gradient-primary opacity-6"></span>
                </div>

                <div class="mx-4 card card-body blur shadow-blur mt-n6">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img class="rounded-circle avatar-xl" src="{{ (!empty(auth()->user()->profile_image)) ? url('upload/profile_images/' . auth()->user()->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                <a href="javascript:;" class="bottom-0 btn btn-sm btn-icon-only bg-gradient-light position-absolute end-0 mb-n2 me-n2">
                                    <i class="" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="" aria-label=""></i><span class=""></span>
                                </a>
                            </div>
                        </div>

                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{auth()->user()->first_name}} {{auth()->user()->middle_initial}}. {{auth()->user()->last_name}}
                                </h5>
                                <p class="mb-0 text-sm font-weight-bold">
                                    {{$adminData->email}}
                                </p>
                            </div>
                    </div>

                <div class="card-body">
                    <h4 class="card-title"> Name: {{auth()->user()->first_name}} {{auth()->user()->middle_initial}}.  {{auth()->user()->last_name}} </h4>
                    <hr>
                    <h4 class="card-title"> User Email: {{$adminData->email}} </h4>
                    <hr>


                    <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile</a>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

@endsection


{{-- <div>
    <div class="container-fluid">
        <div class="mt-4 page-header min-height-300 border-radius-xl" style="background-image: url('../assets/img/bokeh/pexels-bokeh.jpeg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="mx-4 card card-body blur shadow-blur mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img class="rounded-circle avatar-xl" src="{{ (!empty(auth()->user()->profile_image)) ? url('upload/profile_images/' . auth()->user()->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                        <a href="javascript:;" class="bottom-0 btn btn-sm btn-icon-only bg-gradient-light position-absolute end-0 mb-n2 me-n2">
                            <i class="top-0 fa fa-pen" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Image" aria-label="Edit Image"></i><span class="sr-only">Edit Image</span>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{auth()->user()->first_name}}  {{auth()->user()->last_name}}
                        </h5>
                        <p class="mb-0 text-sm font-weight-bold">
                            {{$adminData->email}}
                        </p>
                    </div>
            </div>

        </div>
    </div>
    <div class="py-4 container-fluid">
        <div class="card">
            <div class="px-3 pb-0 card-header">
                <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="p-3 pt-4 card-body">
                <form action="/user-profile" method="POST" role="form text-left">
                    <input type="hidden" name="_token" value="c4UeMuTI106fhYiyhiiHzhMxtc4l4XCijwJzcvSe">                                                            <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">Full Name {{auth()->user()->first_name}}  {{auth()->user()->last_name}}</label>
                                <div class="">
                                    <input class="form-control" value="ab" type="text" placeholder="Name" id="user-name" name="name" onfocus="focused(this)" onfocusout="defocused(this)">
                                                                        </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">Email {{$adminData->email}} </label>
                                <div class="">
                                    <input class="form-control" value="admin@admin.com" type="email" placeholder="@example.com" id="user-email" name="email" onfocus="focused(this)" onfocusout="defocused(this)">
                                                                        </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="mt-4 mb-4 btn bg-gradient-dark btn-md">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div> --}}
