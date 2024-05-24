@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Total Pending Items</p>
                                <h4 class="mb-2">{{$pending_item_instances->count()}}</h4>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Total Endorsed Items</p>
                                <h4 class="mb-2">{{$endorsed_item_instances->count()}}</h4>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Users</p>
                                <h4 class="mb-2">{{$users_count}}</h4>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Pending Requests Forms</p>
                                <h4 class="mb-2">{{$pending_requests->count()}}</h4>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Pending Requests</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-centered table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_requests as $pending_request)
                                    <tr>
                                        <td>
                                            <h6>{{$pending_request->user->first_name}}
                                                {{$pending_request->user->last_name}}</h6>
                                        </td>
                                        <td>{{$pending_request->item_name}}</td>
                                        <td>
                                            {{$pending_request->quantity}}
                                        </td>
                                        <td>
                                            {{$pending_request->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Approved Requests</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-centered table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($approved_requests as $approved_request)
                                    <tr>
                                        <td>
                                            <h6>{{$approved_request->user->first_name}}
                                                {{$approved_request->user->last_name}}</h6>
                                        </td>
                                        <td>{{$approved_request->item_name}}</td>
                                        <td>
                                            {{$approved_request->quantity}}
                                        </td>
                                        <td>
                                            {{$approved_request->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 card-title">Declined Requests</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-centered table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($declined_requests as $declined_request)
                                    <tr>
                                        <td>
                                            <h6>{{$declined_request->user->first_name}}
                                                {{$declined_request->user->last_name}}</h6>
                                        </td>
                                        <td>{{$declined_request->item_name}}</td>
                                        <td>
                                            {{$declined_request->quantity}}
                                        </td>
                                        <td>
                                            {{$declined_request->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="pb-0 card-body">
                        <h4 class="mb-4 card-title">Item Instances</h4>
                        <div class="pt-3 text-center">
                            <canvas id="revenueChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Good Condition', 'For Repair', 'Damage'],
            datasets: [{
                label: 'Item Instances',
                data: [{{$pending_item_instances->count()}},{{$damages->count()}}, {{$for_repairs->count()}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

@endsection
