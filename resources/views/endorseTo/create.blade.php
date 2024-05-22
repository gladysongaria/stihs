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
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Endorse To</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('endorseTo.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- user_name --}}
                        <div class="col-md-12">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Name</label>
                                <div class="col-sm-12">
                                    <select id="teachers_in_charge" name="teachers_in_charge[]"
                                        class="form-control selectpicker" multiple data-live-search="true"
                                        required>
                                        @foreach ($endorseTo as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name }}
                                                {{ $user->middle_initial }}. {{ $user->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> <br>
                            </div>
                        </div>

                        {{-- quantity --}}
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Quantity</label>
                                <input name='endorsed_quantity' class="form-control " type="number" value="{{ old('endorsed_quantity') }}">
                                @error('endorsed_quantity')
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

<script>
    $(document).ready(function() {
        $('.teachers_in_charge').select2({
            placeholder: "Select Teachers-In-Charge",
            allowClear: true
        });

        $("#teachers_in_charge").select2({
            ajax: {
                url: "{{ route('room.getTeachersInCharge') }}",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        name: params.term,
                        _token: "{{ csrf_token() }}",
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                            }
                        })
                    };
                },
            }
        });
    });
</script>
