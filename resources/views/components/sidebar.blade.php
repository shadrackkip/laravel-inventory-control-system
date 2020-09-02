<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">LOGO</span>
        </a>
    </div>
    <div class="sidebar-user">
        <div class="sidebar-user-picture">
            <img alt="image" src="/assets/img/userbig.png">
        </div>
        <div class="sidebar-user-details">
            <div class="user-name">{{auth('admin')->user()->name}}</div>
            <div class="user-role">Administrator</div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="@if(request()->path()=='admin') active @endif"><a class="nav-link" href="/admin"><i data-feather="monitor"></i><span>Dashboard</span></a></li>

        <li class="dropdown @if(request()->path()=='admin/users' || request()->path()=='admin/users/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="users"></i><span>Users</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/users/add">Add</a></li>
                <li><a class="nav-link" href="/admin/users">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/warehouses'|| request()->path()=='admin/warehouses/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="award"></i><span>Warehouses</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/warehouses/add">Add</a></li>
                <li><a class="nav-link" href="/admin/warehouses">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/suppliers' || request()->path()=='admin/suppliers/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="user"></i><span>Suppliers</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/suppliers/add">Add</a></li>
                <li><a class="nav-link" href="/admin/suppliers">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/inventory' || request()->path()=='admin/inventory/add' || request()->path()=='admin/inventory/view') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="grid"></i><span>Inventory</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/inventory">Products</a></li>
                <li><a class="nav-link" href="/admin/inventory/materials">Materials</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/attributes' || request()->path()=='admin/attributes/view'|| request()->path()=='admin/attributes/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="bookmark"></i><span>Attributes</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/attributes/add">Add attributes</a></li>
                <li><a class="nav-link" href="/admin/attributes">View attributes</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/categories' || request()->path()=='admin/categories/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="list"></i><span>Categories</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/categories/add">Add</a></li>
                <li><a class="nav-link" href="/admin/categories">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/brands' || request()->path()=='admin/brands/add') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="crosshair"></i><span>Brands</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/brands/add">Add</a></li>
                <li><a class="nav-link" href="/admin/brands">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/orders') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="activity"></i><span>Orders</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/orders">View Orders</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/payments') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="credit-card"></i><span>Payments</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/payments">View Transactions</a></li>
            </ul>
        </li>
        <li class="dropdown @if(request()->path()=='admin/reports') active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="bar-chart"></i><span>Reports</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/reports/add">Generate</a></li>
                <li><a class="nav-link" href="/admin/reports">View All</a></li>
            </ul>
        </li>
        <li class="dropdown @if(
    request()->path()=='admin/settings/general' || request()->path()=='admin/settings/units_of_measure'||
    request()->path()=='admin/settings/operations' || request()->path()=='admin/settings/locations'||
    request()->path()=='admin/settings/data_import'
     ) active @endif">
            <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/settings/general">General</a></li>
                <li><a class="nav-link" href="/admin/settings/units_of_measure">Units of measure</a></li>
                <li><a class="nav-link" href="/admin/settings/tax_rates">Tax rates</a></li>
                <li><a class="nav-link" href="/admin/settings/operations">Operations</a></li>
                <li><a class="nav-link" href="/admin/settings/locations">Locations</a></li>
                <li><a class="nav-link" href="/admin/settings/data_import">Data import</a></li>
            </ul>
        </li>


{{--        <li class="dropdown">--}}
{{--            <a href="#" class="nav-link has-dropdown"><i data-feather="chevrons-down"></i><span>Multilevel</span></a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li><a href="#">Menu 1</a></li>--}}
{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="has-dropdown">Menu 2</a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a href="#">Child Menu 1</a></li>--}}
{{--                        <li class="dropdown">--}}
{{--                            <a href="#" class="has-dropdown">Child Menu 2</a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a href="#">Child Menu 1</a></li>--}}
{{--                                <li><a href="#">Child Menu 2</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="#"> Child Menu 3</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</aside>
