<!-- Modal -->
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <!-- Other input fields for editing user details -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input name='first_name' class="form-control" type="text" value="{{ $user->first_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input name='last_name' class="form-control" type="text" value="{{ $user->last_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Middle</label>
                                <input name='middle_initial' class="form-control" type="text" value="{{ $user->middle_initial }}" required>
                            </div>
                        </div>

                        {{-- user_email --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name='user_email' class="form-control" type="text" value="{{ $user->user_email }}" required>
                            </div>
                        </div>


                        {{-- department_name --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <select name="department_name" class="form-control" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @if($departments && count($departments) > 0)
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>No departments available</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                         {{-- user_type --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">User Type</label>
                                <select name="user_type" class="form-control" required>
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="Admin">Administrator</option>
                                    <option value="Property Custodian">Property Custodian</option>
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
                        <!-- ... -->
                    </div>

                    {{-- save changes button --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
