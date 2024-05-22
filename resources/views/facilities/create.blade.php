{{-- Create Modal --}}
<div class="modal fade " id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">
                    Add Facility</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('facility.store') }}" method="POST">

                    @csrf

                    <div class="col-md-12">
                        <div class="mb-0 position-relative"><br>
                            <label class="form-label">Facility</label>
                            <div class="col-sm-12">
                                <input name='facility_name' class="form-control" type="text" value="{{ old('facility_name') }}">
                            </div>
                        </div>
                    </div><br>

                    </div><br>

                    {{-- add facility button --}}

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
