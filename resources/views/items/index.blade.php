@extends('admin.admin_master')
@section('admin')

<style>
    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        overflow-x: auto; /* Add overflow-x auto for horizontal scrolling on small screens */
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 10px;
        text-align: left;
        white-space: nowrap; /* Prevent line breaks for long content */
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
                    <h4 class="mb-sm-0">Item List</h4>
                    <!-- Add button with proper data-bs-toggle and data-bs-target attributes -->
                    <button data-bs-toggle="modal" data-bs-target="#create" class="btn btn-sm btn-primary waves-light">Add Item</button>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('items.create')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Add Category Button -->
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Item Image</th>
                                    <th>Category</th>
                                    <th>Item Name</th>
                                    <th>Item Description</th>
                                    <th>Item Specification</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>
                                        @if ($item->item_image)
                                            <span>
                                                <img src="{{ asset($item->item_image) }}" height="50">
                                            </span>
                                        @else
                                            <span>No Image Available</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->item_description }}</td>
                                    <td>{{ $item->item_specification }}</td>
                                    <td><a href="{{route('instance.index', $item->id)}}">{{ $item->item_instances_count }}</a>
                                    </td>

                                    <td>
                                        @include('items.edit')
                                        <button type="button"
                                        class="ri-edit-line btn-outline-primary waves-light"
                                            data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"></button>

                                        <button type="button"
                                        class="ri-delete-bin-6-line btn-outline-danger waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $item->id }}"></button>
                                    </td>

                                    {{-- Delete Modal --}}

                                    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="delete{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete{{ $item->id }}Label">
                                                        Delete
                                                        Item</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete {{ $item->item_name }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST">
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
