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
                    <h4 class="mb-sm-0">Individual Monitoring Report</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if (auth()->user()->usertype == 'Admin' || auth()->user()->usertype == 'Property Custodian')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Individual List</h4>



                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Usertype</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }} {{ $user->middle_initial}}. {{
                                                $user->last_name }}</td>
                                            <td>{{$user->usertype}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @include('individual.print')
                                                {{-- <a href="{{ route('individual.show', $user->id) }}"
                                                    class="btn btn-primary btn-sm">View</a> --}}

                                                @include('individual.pdf')

                                                <button type="button" {{-- class="ri-eye-line " --}}
                                                    data-bs-toggle="modal"
                                                    class="btn btn-sm btn-primary waves-light" style="background-color: rgb(0, 123, 255); border-color: rgb(0, 123, 255);"

                                                    data-bs-target="#print{{ $user->id }}">Custodian Slip</button>

                                                <button type="button" {{-- class="mdi mdi-ticket-confirmation-outline"
                                                    --}}
                                                    class="btn btn-sm btn-primary waves-light" style="background-color: rgb(22, 120, 7); border-color: rgb(22, 120, 7);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#pdf{{ $user->id }}">Property Tag</button>


                                                     @if(auth()->check() && auth()->user()->usertype == 'Property Custodian')
                                                    @include('individual.item_condition')

                                                    <button
                                                    class="btn btn-sm btn-primary waves-light" style="background-color: red; border-color: red;"
                                                    type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#itemCondition{{ $user->id }}">
                                                        Item Condition
                                                    </button>
                                                @endif


                                                    @include('individual.scan')


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

        @else
        <h4> You can't access this page. </h4>
        @endif

    </div>
</div>

@endsection
