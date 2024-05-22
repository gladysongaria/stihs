@extends('admin.admin_master')
@section('admin')

<style>
    .header1 {
        margin-bottom: 10px;
        text-align: center;
        font-family: serif;
        font-size: 17px;
        font-display: solid black;
    }

    .logo-lg1 img {
        width: 150px;
        height: auto;
    }

    .logo-lg2 img {
        width: 100px;
        height: auto;
        margin-right: 10px;
    }

    .logo-lg1 {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .logo-lg2 {
        float: right;
        margin-left: 10px;
        margin-bottom: 10px;
    }

    .title {
        margin-bottom: 10px;
        font-family: serif;
        font-size: 20px;
        font-display: solid black;
    }

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

    input[type="text"] {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #0056b3;
        box-sizing: border-box;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <form action="{{ route('scan.barcode') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input autofocus class="text-center form-control" type="text" name="serial_number"
                    placeholder="Enter Serial Number">
            </div>
        </form>
        <!-- end page title -->

        @include('scan.scan')

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('success') }}
        </div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('error') }}
        </div>
        @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">



                @if ($item_instance)

                <div class="mb-3 position-relative">
                    <label class="form-label">Item No.: {{ $item_instance ? $item_instance->item_id : '' }}</label>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 position-relative">
                        <label class="form-label">Item Name: {{ $item_instance ? $item_instance->item->item_name : ''
                            }}</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 position-relative">
                        <label class="form-label">Status: {{ $item_instance ? $item_instance->status : '' }}</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3 position-relative">
                        <label class="form-label">Endorsed To: {{ $item_instance ? $item_instance->user->first_name . '
                            ' . $item_instance->user->middle_initial . '. ' . $item_instance->user->last_name : ''
                            }}</label>
                    </div>
                </div>

                {{-- <button data-bs-toggle="modal" data-bs-target="#edit{{ $item_instance->id }}"
                    class="btn btn-sm btn-outline-primary waves-effect waves-light">Edit</button> --}}
                @include('scan.edit', ['id' => $item_instance->id])
                @endif


            </div>
        </div>
    </div>
</div>

@endsection
