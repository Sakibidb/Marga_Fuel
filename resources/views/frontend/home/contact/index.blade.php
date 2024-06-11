@extends('frontend.home.master')

<style>
    /* Custom CSS can go here */
    #map {
        height: 400px;
        width: 100%;
    }

    .contact-info {
        /* display: inline-block; */
        margin-right: 20px;
        /* Adjust as needed */
    }
</style>

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                @foreach ($contacts as $contact)
                    <div class="contact-info">
                        <i class="fa fa-map-marker" style="font-size:24px"></i>
                        <span class="pl-2">{{ $contact->address }}</span>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-phone" style="font-size:24px"></i>
                        <span class="pl-1">{{ $contact->mobile }}</span>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-envelope" style="font-size:24px"></i>
                        <span class="">{{ $contact->email }}</span>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">{{ __('language.name') }}:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">{{ __('language.email') }}:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                    </div>
                    <div class="col-md-12">
                        <label for="message">{{ __('language.message') }}:</label>
                        <textarea class="form-control w-100" id="message" name="message" placeholder="" rows="5" required></textarea>
                    </div>
                </div>
                <button class="btn btn-primary mt-2 mb-3">{{ __('language.send') }}</button>
            </div>

            <div class="col-md-12">

                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Google Maps API (optional, only if using Google Maps) -->
<!-- Replace YOUR_API_KEY with your actual API key -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    // Initialize and display the map
    function initMap() {
        var mapOptions = {
            center: {
                lat: 23.757135,
                lng: 90.366562
            }, // Center the map on the provided coordinates
            zoom: 15 // Adjust the zoom level as needed
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        // Add a marker to the map
        var marker = new google.maps.Marker({
            position: {
                lat: 23.757135,
                lng: 90.366562
            }, // Provide the marker's position
            map: map,
            title: "Your Company Location" // Provide a title for the marker (optional)
        });
    }
</script>
