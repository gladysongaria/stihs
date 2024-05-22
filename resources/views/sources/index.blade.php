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
                    <h4 class="mb-sm-0">Sources</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Add Source</h4>
                        </h4>

                        <div class="row">
                            <form action="{{ route('source.store') }}" method="POST">

                                @csrf

                                <div class="col-md-12">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">Source</label>
                                        <div class="col-sm-12">
                                            <input name='source' class="form-control" type="text"
                                                value="{{ old('source') }}">
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

                                <br>

                        </div><br>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-4 card-title">List of Sources </h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Source</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sources as $source)
                                <tr data-id="1" style="">
                                    <td> <a href="">{{ $source->source }}</a> </td>
                                    <td> {{ $source->description }} </td>
                                    <td>

                                        @include('sources.edit')
                                        <button type="button"
                                        class="btn btn-sm btn-primary waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $source->id }}">Edit</button>

                                        <button type="button"
                                        class="btn btn-sm btn-danger waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $source->id }}">Delete</button>
                                    </td>

                                    {{-- Delete Modal --}}

                                    <div class="modal fade" id="delete{{ $source->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="delete{{ $source->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete{{ $source->id }}Label">
                                                        Delete Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete
                                                        {{ $source->source }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('source.destroy', $source->id) }}"
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
            </div>
        </div>
    </div>
</div>
</div>
@endsection
