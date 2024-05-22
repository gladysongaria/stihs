@extends('admin.admin_master')
@section('admin')

<style>
    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 13px;
        /* Adjusted font size to be smaller */
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 6px;
        /* Adjusted padding for a more compact appearance */
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
        padding: 4px 8px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 12px;
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
                    <h4 class="mb-sm-0">Item Instances List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <!-- Show Button -->
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemInstances as $instance)
                                <tr>
                                    <?php
                                    // Extract only digits from the serial number
                                    $serialNumberDigits = preg_replace('/[^0-9]/', '', $instance->serial_number);


                                    // Generate EAN13 barcode HTML
                                    $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 1, 30);
                                    ?>

                                    <td>{!! $html !!}
                                        {{$instance->serial_number}}</td>

                                            <td>{{$instance->status}}</td>

                                    <td>{{$instance->status}}</td>
                                    <td>
                                        <button type="button"
                                        class="ri-edit-line"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $instance->id }}">Edit</button>

                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#endorse{{ $item->id }}">Endorse
                                            To</button>

                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger waves-effect waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $instance->id }}">Delete</button>
                                    </td>

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

                                    @include('items.endorse')

                                    {{-- Delete Modal --}}

                                    <div class="modal fade" id="delete{{ $instance->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="delete{{ $instance->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete{{ $instance->id }}Label">Delete
                                                        Instance</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete {{$instance->serial_number}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('instance.destroy', $instance->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection
