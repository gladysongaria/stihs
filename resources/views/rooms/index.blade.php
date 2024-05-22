@extends('admin.admin_master')
@section('admin')

<style>
    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 10px;
        text-align: left;
    }

    .table thead th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f0f0;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Rooms</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Add Rooms</h4>
                            </h4>

                            <form action="{{ route('room.store') }}" method="POST">

                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-0 position-relative"><br>
                                            <label class="form-label">Room Number</label>
                                            <div class="col-sm-12">
                                                <input name='room_number' class="form-control" type="number"
                                                    value="{{ old('room_number') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-0 position-relative"><br>
                                            <label class="form-label">Building Number</label>
                                            <div class="col-sm-12">
                                                <select name="building_number" class="form-control" required>
                                                    <option value=" ">Select Building</option>
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
                                                    value="{{ old('floor_number') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-0 position-relative"><br>
                                            <label class="form-label">Facility</label>
                                            <div class="col-sm-12">
                                                <select name="facility_name" class="form-control" required>
                                                    <option value="" disabled selected>Select Facility</option>
                                                    @foreach ($facilities as $facility)
                                                        <option value="{{ $facility->id }}">{{ $facility->facility_name }}
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
                                                    value="{{ old('description') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-0 position-relative"><br>
                                            <label class="form-label">Teachers-In-Charge</label>
                                            <div class="col-sm-12">
                                                <select id="teachers_in_charge" name="teachers_in_charge[]"
                                                    class="form-control selectpicker" multiple data-live-search="true"
                                                    required>

                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->first_name }}
                                                            {{ $user->middle_initial }}. {{ $user->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> <br>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>
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

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">List of Rooms</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Room No.</th>
                                        <th>Bldg. No.</th>
                                        <th>Floor No.</th>
                                        <th>Description</th>
                                        <th>Teachers-In-Charge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr data-id="1" style="cursor: pointer;">
                                            <td>{{ $room->room_number }}</td>
                                            <td>{{ $room->building_number }}</td>
                                            <td>{{ $room->floor_number }}</td>
                                            <td>{{ $room->description }}</td>
                                            <td>
                                                @foreach ($room->teachersInCharge as $user)
                                                    {{ $user->first_name }} {{ $user->middle_initial }}.
                                                    {{ $user->last_name }}<br>
                                                @endforeach
                                            </td>

                                            <td>
                                            {{-- @include('rooms.edit') --}}
                                                <div>
                                                    <button type="button"
                                                    class="btn btn-sm btn-primary waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $room->id }}">Edit</button>
                                                    <button type="button"
                                                    class="btn btn-sm btn-danger waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $room->id }}">Delete</button>
                                                </div>
                                            </td>




                                            {{-- Delete Modal --}}

                                            <div class="modal fade" id="delete{{ $room->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="delete{{ $room->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete{{ $room->id }}Label">
                                                                Delete
                                                                Room</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete room
                                                                {{ $room->room_number }}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('room.destroy', $room->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
