<aside class="main-sidebar sidebar-dark-green elevation-4">
    {{-- Brand Logo --}}
    <a href="" class="brand-link">
        <img src="{{ asset('images/logos/logo.png') }}" alt="Mendoza Cafe logo" class="brand-image text-center"
            style="width:35px;height:35px;">
        <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar">
        {{-- Sidebar user panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(getAvatar(session('usr_id'))) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascipt:void(0)" class="d-block">{{ session('usr_first_name') }}</a>
                <span class="brand-text font-weight-light"
                    style="color:gray;"><small>{{ session('acc_name') }}</small></span>
            </div>
        </div>

        {{-- * Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- Home --}}
                @if (session('ADMIN') == '1' ||
                        session('OWNER') == '1' ||
                        session('MANAGER') == '1' ||
                        session('BILLING_SUPERVISOR') == '1' ||
                        session('BILLING') == '1' ||
                        session('CASHIER_SUPERVISOR') == '1' ||
                        session('CASHIER') == '1' ||
                        session('HRIS_MANAGER') == '1' ||
                        session('EMPLOYEE') == '1')
                    <li class="nav-item">
                        <a href="{{ action('App\Http\Controllers\AdminController@home') }}"
                            class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>HOME</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>MESSAGES</p>
                        </a>
                    </li>
                @endif

                <div class="dropdown-divider"></div>

                {{-- Point of Sale --}}
                @if (session('ADMIN') == '1' ||
                        session('OWNER') == '1' ||
                        session('MANAGER') == '1' ||
                        session('BILLING_SUPERVISOR') == '1' ||
                        session('BILLING') == '1' ||
                        session('CASHIER_SUPERVISOR') == '1' ||
                        session('CASHIER') == '1' ||
                        session('HRIS_MANAGER') == '1' ||
                        session('EMPLOYEE') == '1')
                    <li class="nav-header">Point of Sale</li>

                    <li class="nav-item {{ request()->is('admin/pos/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/pos/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                TRANSACTIONS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ action('App\Http\Controllers\POSController@pos_main') }}"
                                    class="nav-link {{ request()->is('admin/pos/new-transaction') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>POS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('App\Http\Controllers\POSController@transaction_history') }}"
                                    class="nav-link {{ request()->is('admin/pos/transactions') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>TRANSACTION HISTORY</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('App\Http\Controllers\POSController@cash_on_hand') }}"
                                    class="nav-link {{ request()->is('admin/pos/cash-on-hand') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CASH MANAGEMENT</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/utility*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/utility*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                UTILITIES
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ action('App\Http\Controllers\UtilityController@category_main') }}"
                                    class="nav-link {{ request()->is('admin/utility/manage-categories') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CATEGORIES</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                    class="nav-link {{ request()->is('admin/utility/categories') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MENU</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                    class="nav-link {{ request()->is('admin/utility/clients') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>INVENTORIES</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <div class="dropdown-divider"></div>

                {{-- HRIS --}}
                <li class="nav-header">HRIS</li>
                <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            HRMD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                            class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>EMPLOYEES</p>
                        </a>
                        <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    ATTENDANCES
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>MY DTR</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>EMPLOYEES DTR</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    LEAVE APPLICATIONS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>FILE LEAVE</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>LEAVE HISTORY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>LEAVE CREDITS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>EMPLOYEES LEAVE</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    VIOLATIONS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>MY VIOLATIONS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>EMPLOYEES VIOLATIONS</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            ACCOUNTING
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    PAYROLL
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>PAYSLIP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>HISTORY</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    ACCOUNTING PAYROLL
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                        class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>EMPLOYEES PAYROLL</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <div class="dropdown-divider"></div>

                <li class="nav-item {{ request()->is('admin/setup*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/setup*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            ACCOUNTS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>INFORMATION</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ action('App\Http\Controllers\AdminController@setup') }}"
                                class="nav-link {{ request()->is('admin/setup') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SETUP</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ! Signout --}}
                <li class="nav-item">
                    <a href="{{ action('App\Http\Controllers\LoginController@logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out"></i>
                        <p>
                            SIGN OUT
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>