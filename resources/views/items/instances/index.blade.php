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
        text-align: center;
    }

    .table thead th {
        background-color: #f5f5f5;
        font-weight: bold;
        text-align: center;
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

        @if (auth()->user()->usertype == 'Property Custodian')

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#pending" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Pending</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#endorsed" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Endorsed</span>
                            </a>
                        </li>
                    </ul>

                    <div class="p-3 tab-content text-muted">

                        <div class="tab-pane active" id="pending" role="tabpanel">
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
                                        @foreach ($pendingItemInstances as $instance)
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
                                            <td>
                                                <button type="button" class="ri-edit-line" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $instance->id }}"></button>

                                                <button type="button" class="ri-user-shared-line" data-bs-toggle="modal"
                                                    data-bs-target="#endorse{{ $instance->id }}"></button>


                                                <button type="button" class="ri-delete-bin-6-line"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $instance->id }}"></button>
                                            </td>

                                            @include('items.instances.edit')
                                            @include('items.instances.endorse')

                                            {{-- Delete Modal --}}

                                            <div class="modal fade" id="delete{{ $instance->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="delete{{ $instance->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete{{ $instance->id }}Label">
                                                                Delete
                                                                Instance</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete
                                                                {{$instance->serial_number}}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('instance.destroy', $instance->id) }}"
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

                        <div class="tab-pane" id="endorsed" role="tabpanel">
                            <div class="card-body">
                                <!-- Show Button -->
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Endorsed To</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($endorsedItemInstances as $instance)
                                        <tr>
                                            <?php
                                                // Extract only digits from the serial number
                                                $serialNumberDigits = preg_replace('/[^0-9]/', '', $instance->serial_number);


                                                // Generate EAN13 barcode HTML
                                                $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 1, 30);
                                                ?>

                                            <td> {!! $html !!}
                                                {{$instance->serial_number}}</td>

                                            <td>{{$instance->user->first_name}} {{$instance->user->middle_initial}}.
                                                {{$instance->user->last_name}}</td>
                                            <td>{{$instance->status}}</td>
                                            <td>
                                                <button type="button" class="ri-edit-line" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $instance->id }}"></button>

                                                <button type="button" class="ri-delete-bin-6-line"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $instance->id }}"></button>
                                            </td>

                                            @include('items.instances.edit')
                                            @include('items.instances.endorse')

                                            {{-- Delete Modal --}}

                                            <div class="modal fade" id="delete{{ $instance->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="delete{{ $instance->id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete{{ $instance->id }}Label">
                                                                Delete
                                                                Instance</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete
                                                                {{$instance->serial_number}}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('instance.destroy', $instance->id) }}"
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
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        @elseif (auth()->user()->usertype == 'Admin')

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#pending" role="tab"
                                aria-selected="true">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Pending</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#endorsed" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Endorsed</span>
                            </a>
                        </li>
                    </ul>

                    <div class="p-3 tab-content text-muted">

                        <div class="tab-pane active" id="pending" role="tabpanel">
                            <div class="card-body">
                                <!-- Show Button -->
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendingItemInstances as $instance)
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="endorsed" role="tabpanel">
                            <div class="card-body">
                                <!-- Show Button -->
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Endorsed To</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($endorsedItemInstances as $instance)
                                        <tr>
                                            <?php
                                    // Extract only digits from the serial number
                                    $serialNumberDigits = preg_replace('/[^0-9]/', '', $instance->serial_number);


                                    // Generate EAN13 barcode HTML
                                    $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 1, 30);
                                    ?>

                                            <td>{!! $html !!}
                                                {{$instance->serial_number}}</td>
                                            <td>{{$instance->user->first_name}} {{$instance->user->middle_initial}}.
                                                {{$instance->user->last_name}}</td>
                                            <td>{{$instance->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        @elseif (auth()->user()->usertype == 'User' || auth()->user()->usertype == 'Teacher')

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                        <li class="nav-item active">
                            <a class="nav-link" data-bs-toggle="tab" href="#endorsed" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Endorsed</span>
                            </a>
                        </li>
                    </ul>

                    <div class="p-3 tab-content text-muted">

                        <div class="tab-pane active" id="endorsed" role="tabpanel">
                            <div class="card-body">
                                <!-- Show Button -->
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            {{-- <th>Item</th> --}}
                                            <th>Serial Number</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($endorsedItemInstances as $instance)
                                        {{-- <td>{{$instance->item}}</td> --}}
                                        <tr>
                                            <?php
                                    // Extract only digits from the serial number
                                    $serialNumberDigits = preg_replace('/[^0-9]/', '', $instance->serial_number);


                                    // Generate EAN13 barcode HTML
                                    $html = DNS1D::getBarcodeHTML($serialNumberDigits, 'EAN13', 1, 30);
                                    ?>

                                            <td>{!! $html !!}
                                                {{$instance->serial_number}}</td>

                                                <td>{{ $instance->item_name }}</td>
                                            <td>{{$instance->status}}</td>
                                            <td>
                                                <button type="button"
                                            class="ri-edit-line"
                                            data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $instance->id }}">Edit</button>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        @else
        <h4> Unauthorized </h4>
        @endif

    </div>
</div>

@endsection
