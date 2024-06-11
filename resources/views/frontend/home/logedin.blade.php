{{-- <!DOCTYPE html>
<html lang="en">
@include('frontend.home.layouts.head')

<body>
    @include('frontend.home.layouts.navbar')

    

    <style>
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
    </style>
    
    <div class="d-flex justify-content-between">
        <div>
            <a class="navbar-brand ml-4" href="{{ route('index') }}"> <img src="{{ asset('assets/img/icon.png') }}"
                    style="width: 100px; height=100px;" class="card-img-top " alt="..."></a>
        </div>
    
        <div class=" d-flex align-items-center">
            <div class="scrolling-text-container">
                <div class="scrolling-text" style="color:red">
                    ওজনে কম দেওয়া কবিরা গুনাহ, মহানবী (সাঃ) বলেনঃ "যে ব্যক্তি ওজন ও পরিমাপে খয়নাত করে, তাকে জাহান্নামের
                    সর্বনিম্ন অংশে নিক্ষেপ করা হবে। সেখানে তাকে আগুনের দুটি পাহাড়ের মাঝে রাখা হবে। তাকে বলা হবে ঐ
                    পাহাড়গুলো ওজন করতে। সে চিরকাল এ কাজে ব্যস্ত থাকবে।"
                </div>
            </div>
            <div class="ml-3" style="color:green">
                Fuel delivery 24/7, same price as petrol stations
            </div>
        </div>
    
        <div class="mr-4 mt-4">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="{{ asset('backend/assets/images/avatars/user.jpg') }}" alt="{{ Auth::user()->name }}'s Photo" />
                <span class="user-info">
                    <small>Welcome,</small>
                    {{ Auth::user()->name }}
                </span>
                <i class="ace-icon fa fa-caret-down"></i>
            </a>
        </div>
    </div>

    @yield('content')
    @include('frontend.home.layouts.footer')
    @include('frontend.home.layouts.script')
</body>

</html>
 --}}
