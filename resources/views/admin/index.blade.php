@extends('admin.admin_master')
@section('admin')

<style>
    .card-body {
        background-color: #ffffff; /* Set your desired background color */
        border-radius: 1rem; /* Optional: Adjust border radius as needed */
    }
    .h4 {
        font-display: black;
    }
    .p {
        font-display: black;
    }
</style>

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
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card" >
                    <div class="card-body" style="background-color: #16d69d ;">
                        <div class="d-flex">
                            <div class="flex-grow-1" >
                                <p class="mb-2 text-truncate font-size-14">Categories</p>
                                <h4 class="mb-2">3</h4>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->


            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color: #45b0ea ;">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Users</p>
                                <h4 class="mb-2">5</h4>
                            </div>

                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color: #ec7474 ;">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-2 text-truncate font-size-14">Requested Forms</p>
                                <h4 class="mb-2">2</h4>
                            </div>

                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

        </div><!-- end row -->

        <div class="card">
            <div class="pb-0 card-body">
                <div class="float-end d-none d-md-inline-block">
                    <div class="dropdown">
                        <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted">This Year <i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">This Year</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-4 card-title">Item Status</h4>

                <div class="pt-3 text-center">
                    <canvas id="revenueChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
            </div><!-- end card -->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Good Condition', 'For Repair', 'Damage'],
            datasets: [{
                label: 'Revenue',
                data: [44960,1000, 11142],
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
