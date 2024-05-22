<!-- Edit Modal -->
<div class="modal fade" id="edit{{$department->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">
                    Edit Department</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="{{ route('department.update',$department->id) }}" method="POST">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-0 position-relative">
                                <label class="form-label">Department</label>
                                <div class="col-sm-12">
                                    <input name='department_name' class="form-control" type="text"
                                        value="{{ $department->department_name }}" required>
                                </div>
                            </div>
                        </div>
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
