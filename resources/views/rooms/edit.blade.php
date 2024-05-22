<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="edit{{ $room->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $room->id }}Label">Edit Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('room.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Room Number</label>
                                <div class="col-sm-12">
                                    <input name='room_number' class="form-control" type="number"
                                        value="{{ $room->room_number}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Building Number</label>
                                <div class="col-sm-12">
                                    <select name="building_number" class="form-control" required>
                                        <option value="Bldg. 1">Bldg. 1 </option>
                                        <option value="Bldg. 2">Bldg. 2 </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Floor Number</label>
                                <div class="col-sm-12">
                                    <input name='floor_number' class="form-control" type="number"
                                        value="{{ $room->floor_number }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Facility</label>
                                <div class="col-sm-12">
                                    <select name="facility_name" class="form-control" required>
                                        <option value="" disabled selected>Select Facility</option>
                                        @foreach($facilities as $facility)
                                        <option value="{{ $facility->id }}" {{ $facility->id ===
                                            $room->facility_id ? 'selected' : '' }}>{{ $facility->facility_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Description</label>
                                <div class="col-sm-12">
                                    <input name='description' class="form-control" type="text"
                                        value="{{ $room->description }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-0 position-relative"><br>
                            <label class="form-label">Teachers-In-Charge</label>
                            <div class="col-sm-12">
                                <select id="teachers_in_charge" name="teachers_in_charge[]"
                                    class="form-control selectpicker" multiple data-live-search="true" required>

                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_initial}}.
                                        {{
                                        $user->last_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div> <br>
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

<script>
    $(document).ready(function() {
        $('.teachers_in_charge').select2({
            placeholder: "Select Teachers-In-Charge",
            allowClear: true
        });

        $("#teachers_in_charge").select2({
           ajax:{
                url: "{{ route('room.getTeachersInCharge') }}",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function(params){
                     return{
                        name:params.term,
                          _token: "{{ csrf_token() }}",
                          search: params.term
                     };
                },
                processResults: function(data){
                     return{
                          results: $.map(data, function(item){
                               return{
                                    id: item.id,
                               }
                          })
                     };
                },
           }
        }
        );
    });

</script>
