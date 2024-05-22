{{-- Create Modal --}}
<div class="modal fade" id="scan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel" >Scan Item</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- old_property_number --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Serial Number</label>
                                <input name='old_property_number' class="form-control" type="text" value="{{ old('old_property_number') }}">
                                @error('old_property_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
