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
                    <h4 class="mb-sm-0">Users</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Add User</h4>
                        </h4>

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <div class="row">

                                {{-- first_name --}}
                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">First Name</label>
                                        <input name='first_name' class="form-control" type="text"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- last_name --}}
                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">Last Name</label>
                                        <input name='last_name' class="form-control" type="text"
                                            value="{{ old('last_name') }}">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- middle_initial --}}
                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">Middle Initial</label>
                                        <input name='middle_initial' class="form-control" type="text"
                                            value="{{ old('middle_initial') }}">
                                        @error('middle_initial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- email --}}

                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">Email</label>
                                        <input name='email' class="form-control" type="text" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- department_name --}}
                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">Department</label>
                                        <div class="col-sm-12">
                                            <select name="department_name" class="form-control" required>
                                                <option value="" disabled selected>Select Department</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- usertype --}}
                                <div class="col-md-6">
                                    <div class="mb-0 position-relative"><br>
                                        <label class="form-label">User Type</label>
                                        <select name="usertype" class="form-control" required>
                                            <option disabled selected>Select User Type</option>
                                            <option value="Admin">Administrator</option>
                                            <option value="Property Custodian">Property Custodian</option>
                                            <option value="User">Teacher</option>
                                        </select>
                                        @error('usertype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- password --}}

                                <div class="col-md-4">
                                    <div class="mb-0 position-relative">
                                        <br>
                                        <label class="form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input name="password" class="form-control" type="password"
                                                value="{{ $randomPassword }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect waves-light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-4 card-title">List of Users</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_initial}}. {{
                                        $user->last_name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ optional($user->department)->department_name }}</td>
                                    <td>
                                        @include('users.edit')
                                        <button type="button"
                                        class="btn btn-sm btn-primary waves-light"
                                            data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">Edit</button>

                                        <button type="button"
                                        class="btn btn-sm btn-danger waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $user->id }}">Delete</button>
                                    </td>

                                    {{-- Delete Modal --}}

                                    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete{{ $user->id }}Label">Delete
                                                        user</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete {{$user->user_name}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
