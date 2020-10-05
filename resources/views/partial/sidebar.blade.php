<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pecel Lele <sup>la</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->level === "kasir" || auth()->user()->level === "owner")
    <li class="nav-item">
        <a class="nav-link" href="{{url('/order')}}">
            <i class="fas fa-fw fa-table"></i><span>Transaction</span>
        </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{url('/invoice')}}">
                <i class="fas fa-fw fa-table"></i><span>Invoice</span>
            </a>
        </li>
    @else
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Table</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Table Screens</h6>
                @if (auth()->user()->level === "admin")
                <a class="collapse-item" href="{{url('/user')}}">User Table</a>
                @endif
                @if (auth()->user()->level === "waiter" || auth()->user()->level === "admin")
                <a class="collapse-item" href="{{url('/foods')}}">Food Table</a>
                @endif
            </div>
        </div>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->