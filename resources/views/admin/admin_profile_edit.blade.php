@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



     <div class="page-content">
        <div class="container-fluid">

            <div class = "row">
                <div class="col-12">
                    <h4 class ="card-title"> Edit Profile Page </h4>
                    <div class= "card">
                        <div class= "card-body">


                            <form method="post" action=" {{ route('store.profile', auth()->user()->id) }} "
                                enctype="multipart/form-data">

                                @csrf



                                <div class= "mb-3 row">
                                    <label for= "example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input name="first_name" class= "form-control" type="text"
                                            value="{{ $editData->first_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!--end row-->

                                <div class= "mb-3 row">
                                    <label for= "example-text-input" class="col-sm-2 col-form-label">Middle Initial</label>
                                    <div class="col-sm-10">
                                        <input name="middle_initial" class= "form-control" type="text"
                                            value="{{ $editData->middle_initial }}" id="example-text-input">
                                    </div>
                                </div>
                                <!--end row-->
                                <div class= "mb-3 row">
                                    <label for= "example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input name="last_name" class= "form-control" type="text"
                                            value="{{ $editData->last_name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!--end row-->

                                <div class= "mb-3 row">
                                    <label for= "example-text-input" class="col-sm-2 col-form-label">User Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" class= "form-control" type="text"
                                            value="{{ $editData->email }}" id="example-text-input">
                                    </div>
                                </div>

                                <!--end row-->

                                <div class= "mb-3 row">
                                    <label for= "example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input name="profile_image" class= "form-control" type="file" id="image">
                                    </div>
                                </div>

                                <!--end row-->

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty(old('profile_image')) ? url('upload/profile_images/' . old('profile_image')) : (!empty(auth()->user()->profile_image) ? url('upload/profile_images/' . auth()->user()->profile_image) : url('upload/no_image.jpg')) }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves light" value="Update Profile">

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection



