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
        text-align: center;
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
                    <h4 class="mb-sm-0">Inventory</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Article/Item</th>
                                        <th>Description</th>
                                        <th>Old Property No.</th>
                                        <th>New Property No.</th>
                                        <th>Unit of Measurement</th>
                                        <th>Quantity</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        @foreach ($category->items as $item)
                                            <tr>
                                                <td>{{ $item->item_name }}</td>
                                                <td>{{ $item->item_description }}</td>
                                                <td>{{ $item->old_property_number }}</td>
                                                <td>{{ $item->new_property_number }}</td>
                                                <td>{{ $item->unit_measure }}</td>
                                                <td>{{ $item->itemInstances->count() }}</td>
                                                <td>{{ $item->source->source }}</td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($item->date_acquired)->format('M d, Y ') }}</td> --}}
                                                <td>
                                                    <div style="text-align: center;">
                                                        <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-sm btn-primary waves-light" style="display: inline-block; ">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
