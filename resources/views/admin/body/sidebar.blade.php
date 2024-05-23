<style>
    .waves-effect {
        color: white !important;
        /* Important to override any existing styles */
    }

    .ri-layout-masonry-line {
        color: white !important;
    }

    .mdimdi-account-group {
        color: white !important;
    }

    .ri-pages-line {
        color: white;
    }
</style>

<div class="vertical-menu" style="background-color: #001524 ;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            @if (auth()->user()->usertype == 'Admin')
            <ul class="metismenu list-unstyled" id="side-menu">

                <br><br>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect" style="color: white;">
                        <i class="ri-layout-masonry-line "></i><span
                            class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('department.index') }}" class="waves-effect" style="color: white;">
                        <i class="ri-building-2-fill"></i>
                        <span>Department</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('facility.index') }}" class="waves-effect" style="color: white;">
                        <i class="ri-building-fill"></i>
                        <span>Facilities</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('room.index') }}" class="waves-effect" style="color: white;">
                        <i class="ri-grid-fill"></i>
                        <span>Rooms</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}" class="waves-effect" style="color: white;">
                        <i class="mdi mdi-account-group"></i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect" style="color: white;">
                        <i class="ri-pages-line"></i>
                        <span>Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('inventory.index') }}">Item Inventory</a></li>
                        <li><a href="{{ route('individual.index') }}">Individual Monitoring Report</a></li>
                        <li><a href="{{ route('source.acquisition') }}">Source Donated</a></li>
                    </ul>
                </li>


                @elseif (auth()->user()->usertype == 'Property Custodian')
                <ul class="metismenu list-unstyled" id="side-menu"> <br><br>
                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect" style="color: white;">
                            <i class="ri-dashboard-line"></i><span
                                class="badge rounded-pill bg-success float-end">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}" class="waves-effect" style="color: white;">
                            <i class="ri-list-check-2"></i>
                            <span>Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('source.index') }}" class="waves-effect" style="color: white;">
                            <i class="ri-hand-coin-line"></i>
                            <span>Sources</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('item.index') }}" class="waves-effect" style="color: white;">
                            <i class="ri-file-edit-line"></i>
                            <span>Item</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('inventory.index') }} " class="waves-effect" style="color: white;">
                            <i class="ri-slideshow-line"></i>
                            <span>Inventory</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect" style="color: white;">
                            <i class="ri-pages-line"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('individual.index') }}">Individual Monitoring Report</a></li>
                            <li><a href="{{ route('source.acquisition') }}">Source Donated</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect" style="color: white;">
                            <i class="ri-pages-line"></i>
                            <span>Supply Requests</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('request.index') }}">Pending Supply Requests</a></li>
                            <li><a href="{{ route('approved.index') }}">Requests</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('scan.index') }}" class="waves-effect" style="color: white;">
                            <i class="ri-barcode-box-line"></i>
                            <span>Scan</span>
                        </a>
                    </li>
                </ul>



                @elseif (auth()->user()->usertype == 'User' || auth()->user()->usertype == 'Teacher')
                <ul class="metismenu list-unstyled" id="side-menu"> <br><br>
                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect" style="color: white;">
                            <i class="ri-dashboard-line"></i><span
                                class="badge rounded-pill bg-success float-end">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('individual.show', auth()->user()->id) }}" class="waves-effect"
                            style="color: white;">
                            <i class="ri-pages-line"></i>
                            <span>Item Endorsed</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('instance.index', auth()->user()->id) }}" class="waves-effect"
                            style="color: white;">
                            <i class="ri-dashboard-line"></i>
                            <span>Item Status</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('request.index') }}" class="waves-effect" style="color: white;">
                            <i class="ri-dashboard-line"></i>
                            <span>Supply Request Form</span>
                        </a>
                    </li>
                </ul>
                @else
                <h4> Invalid User </h4>
                @endif

        </div>
        <!-- Sidebar -->
    </div>
</div>
