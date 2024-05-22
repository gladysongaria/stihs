  <!-- Edit Modal -->
  <div class="modal fade" id="edit{{$instance->id}}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">
                    Edit Item</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('instance.update',$instance->id) }}"
                method="POST">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        {{-- status --}}
                        <div class="col-md-12">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Status</label>
                                <div class="col-sm-12">
                                    <select name="status" class="form-control"
                                        required>
                                        <option value="" disabled selected>Select
                                            Status</option>
                                        <option value="Good Condition">Good
                                            Condition</option>
                                        <option value="Damaged">Damaged</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <br>

                    {{-- save changes button --}}
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-info waves-effect waves-light"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary waves-effect waves-light">Save
                            Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
