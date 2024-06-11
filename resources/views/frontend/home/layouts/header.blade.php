@php
    // $contact = App\Models\backend\CompanyInformation::first();
    $company = App\Models\backend\CompanyInformation::first();

    $description = App\Models\backend\Webcontent::first();
@endphp
<style>
    a:hover {
        text-decoration: none;
    }

    .dropdown-menu a:hover {
        text-decoration: none;
    }

    .icon:hover {
        color: yellow;
        /* Color on hover */
    }

    .scrolling-text-container {
        overflow: hidden;
        white-space: nowrap;
        width: 30rem;
    }

    .scrolling-text {
        animation: scroll 20s linear infinite;
    }

    @keyframes scroll {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @media (max-width: 768px) {
        .navbar-brand img {
            width: 50px;
        }

        .d-flex {
            flex-direction: column;
            align-items: center;
        }
/* height: 1rem; eitar jonno bangla dekha jai na, eita remove kore dilei hobe  */
        .scrolling-text-container {
            width: 20rem;
            height: 1rem;
        }

        .logged-in-user-menu-btn {
            flex-direction: column;
            align-items: center;
        }

        .header_text {
            text-align: center;
        }

        .log {
            margin-left: 4rem;
            margin-bottom: 1rem;
        }
    }
</style>

<div class="d-flex justify-content-between justify-content-between align-items-center flex-wrap">
    <div>
        <a class="navbar-brand ml-4" href="{{ route('index') }}"> <img src="{{ asset('images/' . $company->image ?? '') }}"
                style="width: 100px; height=100px;" class="card-img-top " alt="..."></a>
    </div>

    <div class=" d-flex align-items-center">
        <div class=" scrolling-text-container">
            <div class="scrolling-text" style="color:red">
                <p> {!! __('language.header_scrolling') !!}</p>
            </div>
        </div>
        <div class="ml-3 header_text" style="color:green">
            <p> {!! __('language.header_text') !!}</p>
        </div>
    </div>

    @if (Auth::check())
        <div class="mr-4 log">
            {{-- <a data-toggle="dropdown" href="#" class="dropdown-toggle" style="padding: 20px">
                <img class="rounded-circle border border-black"
                    src="{{ asset('backend/assets/images/avatars/user.jpg') }}"
        alt="{{ Auth::user()->name }}'s Photo" />
        {{ Auth::user()->name }}
        </a> --}}


            <a data-toggle="dropdown" href="#" class="logged-in-user-menu-btn dropdown-toggle center mr-4"
                style="display: flex; align-items: center;">
                <div class="rounded-circle border border-black mb-1"
                    style="width: 33px; height: 33px; display: flex; justify-content: center; align-items: center; font-size: 24px; background-color: #70dbae; color: #3b3b3b;">
                    {{ strtolower(substr(Auth::user()->name, 0, 1)) }}
                </div>
                {{-- <span style="margin-left: 8px;">{{ Auth::user()->name }}</span> --}}
            </a>

            <ul class="dropdown-menu dropdown-caret dropdown-menu-right"
                style="text-align: left; padding:15px; white-space:nowrap">
                <li>
                    @if (Auth::user()->role == 1)
                        <a href="{{ route('login') }}">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('userdeshboard') }}">
                            Dashboard
                        </a>
                    @endif

                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="mr-4 log">
            <a style="color: black; text-decoration: none;" href="{{ route('login') }}">{!! __('language.login') !!}</a>
            <span> | </span>
            <a class="mr-4" style="color: black; text-decoration: none;"
                href="{{ route('register') }}">{!! __('language.registration') !!}</a>
        </div>
    @endif
</div>
