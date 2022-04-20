<div class="sidebar-wrapper sidebar-theme">
    <nav id="compactSidebar">
        <ul class="menu-categories">

            {{-- Dashboard --}}
            <li class="{{ $active_menu == 'dashboard' ? 'menu active' : '' }}">
                <a href="{{ route('dashboard') }}" data-active="{{ $active_menu == '$sale' ? 'true' : '' }}"
                    class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/dashboard.png" width="58" height="58" alt="">
                        </div>
                        <span>Dashboard</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left {{ $active_menu == 'dashboard' ? '' : 'd-none' }}">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>
            {{-- Production --}}
            <li class="menu {{ $active_menu == 'production' ? 'active' : '' }}">
                <a href="#productions" data-active="{{ $active_menu == 'production' ? 'true' : '' }}"
                    class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/sewing-machine.png" width="70" height="70" alt="">
                        </div>
                        <span>Production</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>

            {{-- Accounting --}}
            <li class="menu {{ $active_menu == 'accounting' ? 'active' : '' }}">
                <a href="#accountings" data-active="{{ $active_menu == 'accounting' ? 'true' : '' }}"
                    class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/stat.png" width="54" height="54" alt="">
                        </div>
                        <span>Accounting</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>

            {{-- Users --}}
            <li class="menu {{ $active_menu == 'users' ? 'active' : '' }}">
                <a href="#users" data-active="{{ $active_menu == 'users' ? 'true' : '' }}" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/HRM.png" width="65" height="65" alt="">
                        </div>
                        <span>HRM</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>
            <li class="menu {{ $active_menu == 'reports' ? 'active' : '' }}">
                <a href="#reports" data-active="{{ $active_menu == 'reports' ? 'true' : '' }}" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/report.png" width="65" height="65" alt="">
                        </div>
                        <span>Reports</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>
            <li class="menu {{ $active_menu == 'users' ? 'active' : '' }}">
                <a href="#users" data-active="{{ $active_menu == 'users' ? 'true' : '' }}" class="menu-toggle">
                    <div class="base-menu">
                        <div class="base-icons">
                            <img src="icons/settings.png" width="65" height="65" alt="">
                        </div>
                        <span>Settings</span>
                    </div>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </li>
        </ul>
    </nav>

    <div id="compact_submenuSidebar" class="submenu-sidebar">

        <div class="submenu" id="productions">
            <ul class="submenu-list" data-parent-element="#production">
                <li class="{{ $active_item == 'products' ? 'active' : '' }}">
                    <a href="{{ route('products') }}">
                        <span class="icon">
                            <img src="icons/shirt.png" width="30" height="30" alt="">
                        </span> Products </a>
                </li>
                <li class="{{ $active_item == 'materials' ? 'active' : '' }}">
                    <a href="{{ route('materials') }}">
                        <span class="icon">
                            <img src="icons/textile.png" width="30" height="30" alt="">
                        </span> Raw Materials </a>
                </li>
                <li class="{{ $active_item == 'production' ? 'active' : '' }}">
                    <a href="{{ route('production') }}">
                        <span class="icon">
                            <img src="icons/gear.png" width="30" height="30" alt="">
                        </span> Production </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="accountings">
            <ul class="submenu-list" data-parent-element="#forms">
                <li class="{{ $active_item == 'sales' ? 'active' : '' }}">
                    <a href="{{ route('sales') }}">
                        <span class="icon">
                            <img src="icons/sell.png" width="30" height="30" alt="">
                        </span> Sales </a>
                </li>
                <li class="{{ $active_item == 'purchases' ? 'active' : '' }}">
                    <a href="{{ route('purchases') }}">
                        <span class="icon">
                            <img src="icons/buy.png" width="30" height="30" alt="">
                        </span> Purchases </a>
                </li>
                <li class="{{ $active_item == 'invoices' ? 'active' : '' }}">
                    <a href="{{ route('invoices') }}">
                        <span class="icon">
                            <img src="icons/invoice.png" width="30" height="30" alt="">
                        </span> Invoices </a>
                </li>
            </ul>
        </div>

        <div class="submenu" id="users">
            <ul class="submenu-list" data-parent-element="#users">
                <li>
                    <a href="{{ route('clients') }}">
                        <span class="icon">
                            <img src="icons/client.png" width="30" height="30" alt="">
                        </span> Clients </a>
                </li>
                <li>
                    <a href="{{ route('fournisseurs') }}">
                        <span class="icon">
                            <img src="icons/supplier.png" width="30" height="30" alt="">
                        </span> Suppliers </a>
                </li>
                 <li>
                    <a href="{{ route('employees') }}">
                        <span class="icon">
                            <img src="icons/employee.png" width="30" height="30" alt="">
                        </span> Employees </a>
                </li>

                
                {{-- <li>
                    <a href="widgets.html"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg></span> Widgets </a>
                </li>  --}}
            </ul>
        </div>
        <div class="submenu" id="reports">
            <ul class="submenu-list" data-parent-element="#forms">
                <li class="{{ $active_item == 'sales' ? 'active' : '' }}">
                    <a href="{{ route('reports.sales') }}">
                        <span class="icon">
                            <img src="icons/sell.png" width="30" height="30" alt="">
                        </span> Sales Reports</a>
                </li>
                <li class="{{ $active_item == 'purchases' ? 'active' : '' }}">
                    <a href="{{ route('reports.purchases') }}">
                        <span class="icon">
                            <img src="icons/buy.png" width="30" height="30" alt="">
                        </span> Purchases Reports</a>
                </li>
            </ul>
        </div>
    </div>
</div>
