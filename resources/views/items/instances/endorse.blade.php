<style>
    /* Add this style to your existing styles */
    #create .modal-body .row .form-label {
        width: 100%;
        display: inline-block;
    }

    #create .modal-body .row .form-control {
        width: 100%;
    }
</style>

{{-- Create Modal --}}
<div class="modal fade" id="endorse{{ $instance->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">{{$instance->serial_number}} is Endorse To</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('instance.endorse', $instance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative"><br>
                                <label class="form-label">Name</label>
                                <div class="col-sm-12">
                                    <select name="user" class="form-control"
                                        required>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_initial
                                            }}. {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
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
