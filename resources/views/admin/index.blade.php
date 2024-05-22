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

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                    </div>

                    <h4 class="mb-4 card-title">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table mb-0 align-middle table-centered table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                <tr>
                                    <td>Admin A. Admin<h6 class="mb-0"></h6></td>
                                    <td>Admin</td>
                                    <td>
                                        <div class="font-size-13">
                                            <i class=>admin@gmail.com</i></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Janeth D. Clores<h6 class="mb-0"></h6></td>
                                    <td>Property Custodian</td>
                                    <td>
                                        <div class="font-size-13">
                                            <i class=>janeth@gmail.com</i></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ara Joy Bronosa<h6 class="mb-0"></h6></td>
                                    <td>Teacher</td>
                                    <td>
                                        <div class="font-size-13">
                                            <i class=>ara@gmail.com</i></div>
                                    </td>
                                </tr>
                                <!-- end -->
                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col-xl-8 -->
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
