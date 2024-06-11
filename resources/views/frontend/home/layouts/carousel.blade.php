
@php
    $company = App\Models\backend\CompanyInformation::first();
@endphp

<style>
.carousel-item img {
    width: 100%;
    height: 500px; /* Adjust height as needed */
    object-fit: cover;
}
</style>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/' . ($company->banner1 ?? 'default-banner1.jpg')) }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/' . ($company->banner2 ?? 'default-banner2.jpg')) }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/' . ($company->banner3 ?? 'default-banner3.jpg')) }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
