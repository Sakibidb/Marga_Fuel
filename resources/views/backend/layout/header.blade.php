<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{ route ('dashboard') }}" class="navbar-brand">
                <small>
                    <i class="fa fa-cogs"></i>
                    Admin Panel
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">

            <ul class="nav ace-nav">

                <li class="green dropdown-modal">
                    <a href="{{ route('index') }}">
                        <i class="fa fa-2x fa-globe"></i>
                    </a>
                </li>



                @php
                use App\Models\backend\WebsiteOrder;
                $activeOrdersCount = WebsiteOrder::count();
                @endphp

                <li class="purple dropdown-modal">
                    <a href="{{ route('weborder.index') }}">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">{{ $activeOrdersCount }} order</span>
                    </a>
                </li>



                <li class="green dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            5 Messages
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    {{-- .............. --}}
                                </li>


                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="inbox.html">
                                See all messages
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue dropdown-modal">
                    {{-- <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('backend/assets/images/avatars/user.jpg') }}" alt="{{ Auth::user()->name }}'s Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
                            {{ Auth::user()->name }}
                        </span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a> --}}

                    <a data-toggle="dropdown" href="#" class="logged-in-user-menu-btn dropdown-toggle center mr-4" style="display: flex; align-items: center;" >
                        <div class="nav-user-photo" style="display: flex; align-items: center; justify-content: center; background-color: #f0f0f0; width: 30px; height: 30px; border-radius: 50%; font-size: 20px; color: #333;">
                            {{ strtolower(substr(Auth::user()->name ?? '', 0, 1)) }}
                        </div>
                        {{-- <span class="user-info">
                            <small>Welcome</small>
                            {{ Auth::user()->name ?? '' }}
                        </span>
                        <i class="ace-icon fa fa-caret-down"></i> --}}
                    </a>
                    

        


                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


                        <li class="divider"></li>

                        <li>
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        {{-- <button style="margin:3px 0 0 1050px;color: #ffffff">
            <a href="{{ route('index') }}">
                <i class="fa fa-2x fa-globe notification-icon" style="margin-top: 5px; color: #000000"></i>
            </a>
        </button> --}}
    </div><!-- /.navbar-container -->
</div>
