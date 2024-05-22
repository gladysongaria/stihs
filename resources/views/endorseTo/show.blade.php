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
                        <h4 class="mb-sm-0">Endorse To</h4>

                        <h4 data-bs-toggle="modal" data-bs-target="#create"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light" type="button"> User </h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Add Category Button -->
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Quantity</th>
                                        <th>Endorse Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($endorseTo as $EndorseTo)
                                        <tr>

                                            <td>{{ $endorseTo->user->name }}</td>
                                            <td>{{ $endorseTo->quantity }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_acquired)->format('M d, Y ') }}</td>

                                            </td>

                                            <td>
                                                @include('endorseTo.edit')

                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $endorseTo->id }}">Edit</button>

                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $endorseTo->id }}">Delete</button>
                                            </td>

                                            {{-- Delete Modal --}}

                                            <div class="modal fade" id="delete{{ $endorseTo->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="delete{{ $endorseTo->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete{{ $endorseTo->id }}Label">
                                                                Delete Item</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete {{ $endorseTo->endorseTo_name }}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('item.destroy', $endorseTo->id) }}"
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

