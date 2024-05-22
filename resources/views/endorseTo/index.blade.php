@extends('admin.admin_master')
@section('admin')

<style>
    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 13px; /* Adjusted font size to be smaller */
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 6px; /* Adjusted padding for a more compact appearance */
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
                    <h4 class="mb-sm-0">Endorse To</h4>

                    <h4 data-bs-toggle="modal" data-bs-target="#create" data-bs-target=".bs-example-modal-center"
                    class="btn btn-sm btn-outline-primary waves-effect waves-light " type="button"> Add
                    </h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('endorseTo.create')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Date Acquired</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        @foreach ($endorseTo as $user)
                                            {{ $user->first_name }} {{ $user->middle_initial }}.
                                            {{ $user->last_name }}<br>

                                        <td>{{ \Carbon\Carbon::parse($item->date_endorse)->format('M d, Y ') }}</td>
                                        <td>
                                                    <a href="{{ route('endorseTo.show', $endorseTo->id) }}" class="btn btn-primary btn-sm">View</a>
                                                    <!-- Add any additional actions related to the items here -->
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>

@endsection
