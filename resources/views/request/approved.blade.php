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
        text-align: center;
    }

    .table thead th {
        background-color: #f5f5f5;
        font-weight: bold;
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

<div class="page-content ">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">REQUESTS</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card" style="width: 200%;">
                    <div class="card-body" style="width: 100%; padding:30px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Usertype</th>
                                    <th>Email</th>
                                    <th>Item</th>
                                    <th>Specification</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @foreach ($user->requests as $request)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_initial}}. {{ $user->last_name }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $request->item_name }}</td>
                                    <td>{{ $request->item_specification }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td>
                                        @if($request->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($request->status == 'Approved')
                                        <span class="badge bg-success">Approved</span>
                                        @else
                                        <span class="badge bg-danger">Rejected</span>
                                        @endif
                                </tr>
                                @endforeach

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
