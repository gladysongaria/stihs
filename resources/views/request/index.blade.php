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
                    <h4 class="mb-sm-0">SUPPLY REQUESTS</h4>
                    <button data-bs-toggle="modal" data-bs-target="#request"
                        class="btn btn-sm btn-primary waves-light">Request Supply</button>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if (auth()->user()->usertype == 'Property Custodian')

        @include('request.create')

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @foreach ($user->pendingRequests as $request)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_initial }}. {{ $user->last_name }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $request->item_name }}</td>
                                    <td>{{ $request->item_specification }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary waves-light"
                                            data-bs-toggle="modal" data-bs-target="#accept{{ $request->id }}">
                                            Approve
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger waves-light"
                                            data-bs-toggle="modal" data-bs-target="#decline{{ $request->id }}">
                                            Decline
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary waves-light"
                                            data-bs-toggle="modal" data-bs-target="#requestShow{{ $user->id }}">
                                            View
                                        </button>

                                        @include('request.show', ['request' => $request, 'user' => $user])
                                    </td>
                                </tr>

                                {{-- Accept Modal --}}
                                <div class="modal fade" id="accept{{ $request->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="accept{{ $request->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="accept{{ $request->id }}Label">
                                                    Accept Request</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to approve this request?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('request.update', $request->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="pending_request_id"
                                                        value="{{ $request->id }}">
                                                    <input type="hidden" name="status" value="Approved">
                                                    <input type="hidden" name="date" value="{{ now() }}">
                                                    <button type="submit" class="btn btn-primary">Accept</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Decline Modal --}}
                                <div class="modal fade" id="decline{{ $request->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="decline{{ $request->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="decline{{ $request->id }}Label">
                                                    Decline Request</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('request.update', $request->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="pending_request_id"
                                                        value="{{ $request->id }}">
                                                    <input type="hidden" name="status" value="Declined">
                                                    <div class="mb-3">
                                                        <label for="reason" class="col-form-label">Reason:</label>
                                                        <textarea class="form-control" id="reason" name="reason"
                                                            required></textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Decline</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @elseif (auth()->user()->usertype == 'Admin' || auth()->user()->usertype == 'Teacher')

        @include('request.create')

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @foreach ($user->pendingRequests as $request)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_initial}}. {{ $user->last_name }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $request->item_name }}</td>
                                    <td>{{ $request->item_specification }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-secondary waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#requestShow{{$user->id}}">View</button>

                                        @include('request.show')
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
