<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>



    <ul class="nav nav-list">
        <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- <li class="">
            <a href="{{ route('index') }}">
                <i class="menu-icon fa fa-glob"></i>
                <span class="menu-text"> Main Site </span>
            </a>

            <b class="arrow"></b>
        </li> --}}


        @if (Auth()->user()->role == 1 )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-cube"></i>
                    <span class="menu-text"> Products </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('products.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            All Products
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ route('products.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Products
                        </a>

                        <b class="arrow"></b>
                    </li>

                    {{-- <li class="">
                        <a href="{{ route('categories.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            All category
                        </a>

                        <b class="arrow"></b>
                    </li> --}}
                </ul>
            </li>


            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-home"></i>
                    <span class="menu-text"> Warehouse </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('warehouses.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Warehouse List
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('warehouses.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Warehouse Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>



            {{-- Supplier Start --}}


            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-industry"></i>
                    <span class="menu-text"> Supplier</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('supplier.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Supplier Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('supplier.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Supplier List
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>


            {{-- Supplier end --}}




            {{-- Purchase Start --}}

            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text"> Purchase </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('purchase.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            New Purchase
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('purchase.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Purchase List
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>


            {{-- Purchase end --}}



            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-car"></i>
                    <span class="menu-text"> Vehicles </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('vehicles.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Vehicles List
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('vehicles.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Vehicles Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-truck"></i>
                    <span class="menu-text"> Delivery </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('delivery.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Delivery List
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('delivery.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Delivery Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-exchange"></i>
                    <span class="menu-text">Shift</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('shift.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('shift.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Shift List
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-industry"></i>
                    <span class="menu-text">Stock</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('adjustment.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adjustment
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{route('itemledger.index')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Item Ledger
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-send-o"></i>
                    <span class="menu-text">SMS</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    {{-- <li class="">
                        <a href="{{ route('shift.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create
                        </a>
                        <b class="arrow"></b>
                    </li> --}}
                    <li class="">
                        <a href="{{ route('sms.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            SMS API
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tasks"></i>
                    <span class="menu-text">Vehicles Assign</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('vassign.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('vassign.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Vehicles Assign List
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-edit"></i>
                    <span class="menu-text">Website CMS </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('about.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            About Us
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('privacy.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Privacy Policy
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('terms.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Terms & Condition
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('refund.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Refund & Return Policy
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('company.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Company Information
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('webcontent.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Website Content
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text">Sale</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('weborder.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Website Order
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{-- <li class="">
                        <a href="">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Sale List
                        </a>
                        <b class="arrow"></b>
                    </li> --}}
                </ul>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text">Select Order</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('select.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Category
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('select.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-rocket"></i>
                    <span class="menu-text">Promotion</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('cupon.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Cupon
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{-- <li class="">
                        <a href="">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Sale List
                        </a>
                        <b class="arrow"></b>
                    </li> --}}
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tasks"></i>
                    <span class="menu-text">User</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                        <a href="{{ route('user') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            User List
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('createUserForm') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            User Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->role == 2 || Auth::user()->role == 1)
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Customer </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        {{-- <a href="{{ route('customer.index') }}"> --}}
                            <i class="menu-icon fa fa-caret-right"></i>
                            Customers
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        {{-- <a href="{{ route('customer.create') }}"> --}}
                            <i class="menu-icon fa fa-caret-right"></i>
                            customer create
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->role == 3 || Auth::user()->role == 1)
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-male"></i>
                    <span class="menu-text">Driver</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('driver.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="{{ route('driver.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Driver List
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endif






    </ul>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
