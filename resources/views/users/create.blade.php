<!-- Modal -->

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- user_name --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">User Name</label>
                                <input name='user_name' class="form-control" type="text" value="{{ old('user_name') }}">
                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- user_email --}}

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Email</label>
                                <input name='user_email' class="form-control" type="text"
                                    value="{{ old('user_email') }}">
                                @error('user_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">User Type</label>
                                <select name="user_type" class="form-control" required>
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="Admin">Administrator</option>
                                    <option value="Property_Custodian">Property Custodian</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                                @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
