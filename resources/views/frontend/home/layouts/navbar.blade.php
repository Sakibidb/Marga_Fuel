<style>
    .icon-envelope {
        color: white;
        /* Initial color */
        border-radius: 50%;
        /* Makes the icon rounded */
    }

    .icon-envelope:hover {
        color: yellow;
        /* Color on hover */
    }

    .topnav {
        overflow: hidden;
        background-color: #009C82;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    .language {
        margin-right: 0rem;
    }

    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }

        .language {

            justify-content: center;
            align-items: center;
        }
    }


    .nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

@media screen and (max-width: 600px) {
    .nav-container {
        justify-content: space-between;
    }

    .ml-4, .icon {
        flex: 1;
    }

    .ml-4 {
        display: flex;
        flex-direction: column;
        align-items: start;
    }

    .ml-4 a {
        margin: 5px 0;
    }
}


    @media screen and (max-width: 600px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }

        .contact {
            visibility: hidden;
            display: none;
        }
    }

    /* toggle */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="topnav" id="myTopnav">
    <div class="d-flex justify-content-between mx-5">
        <div class="nav-container">
            <div class="ml-4">
                <a class="ml-lg-5" href="{{ route('index') }}">{{ __('language.home') }}</a>
                <a href="{{ route('more.index') }}">{{ __('language.more') }}</a>
                <a href="{{ route('contact') }}">{{ __('language.contact') }}</a>
                <a href="{{ route('card') }}">{{ __('language.solution') }}</a>
            </div>
            <div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div class="form-check form-switch align-self-center language">

            @if (app()->getLocale() === 'en')
                <a href="{{ route('lang.switch', 'bn') }}"
                    style="background-color: #009C82 # !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important; text-decoration: none;
                    ">
                    <img src="{{ asset('assets/img/toggle1.png') }}" alt="" style="height: 20px; width: 30px;">
                    Bn
                </a>
            @else
                <a href="{{ route('lang.switch', 'en') }}"
                    style="background-color:#009C82 # !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important; text-decoration: none;
                    ">
                    <img src="{{ asset('assets/img/toggle.png') }}" alt="" style="height: 20px; width: 30px;">
                    En
                </a>
            @endif
            {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label ml-2" for="flexSwitchCheckChecked">En</label> --}}
        </div>
        <div class="contact-buttons contact">
            <a href="mailto:mnol.help@gmail.com" class="btn btn-outline-warning rounded-circle mr-2">
                <i class="fa fa-envelope icon-envelope"></i>
            </a>
            <a href="skype:01401433971?call" class="btn btn-outline-warning rounded-circle mr-2">
                <i class="fa fa-phone icon-envelope"></i>
            </a>
            <a href="https://www.google.com/maps/search/?api=1&query=Y/26, Block D, Razia Sultana Road, Mohammadpur, Dhaka, Bangladesh., Dhaka, Bangladesh"
                class="btn btn-outline-warning rounded-circle">
                <i class="fa fa-map-marker icon-envelope"></i>
            </a>
        </div>
    </div>
</div>


<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var switchInput = document.getElementById('flexSwitchCheckChecked');
        var switchLabel = document.querySelector('.form-check-label[for="flexSwitchCheckChecked"]');

        // Initial label text
        var labelText = switchInput.checked ? 'En' : 'Bn';
        switchLabel.textContent = labelText;

        // Toggle label text and change route when switch is clicked
        switchInput.addEventListener('change', function() {
            if (switchInput.checked) {
                labelText = 'En';
                switchLabel.textContent = labelText;
                // Change the route to 'en' when the switch is checked
                href = "{{ route('lang.switch', 'en') }}";
            } else {
                labelText = 'Bn';
                switchLabel.textContent = labelText;
                // Change the route to 'bn' when the switch is unchecked
                href = "{{ route('lang.switch', 'bn') }}";
            }
        });
    });
</script>
