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
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="mb-2 text-truncate font-size-14">Categories</p>
                                    <h4 class="mb-2">4</h4>
                                    <p class="mb-0 text-muted"><span class="text-success fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-up-line me-1"></i></span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>
                                    </span>
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
                                    <p class="mb-2 text-truncate font-size-14">Items</p>
                                    <h4 class="mb-2">15</h4>

                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
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
                                    <h4 class="mb-2">5</h4>
                                    <p class="mb-0 text-muted"><span class="text-success fw-bold font-size-12 me-2"><i
                                                class="align-middle ri-arrow-right-up-line me-1"></i></span>from
                                        previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div><!-- end row -->

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
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
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
    </div>



    </div>
@endsection

