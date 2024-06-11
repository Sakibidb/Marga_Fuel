@php
    $contact = App\Models\backend\CompanyInformation::first();
    $description = App\Models\backend\Webcontent::first();
@endphp

<style>
    @media (min-width: 768px) {
        .me {
            text-align: center;
        }

        .med {
            text-align: center;
        }
    }
</style>

{{-- @dd($contracts) --}}
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>{{ __('language.footHead') }}</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="https://www.facebook.com/marganetone" class="me-4 text-reset">
                <i class="fa fa-facebook-f" style="font-size:24px"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-twitter" style="font-size:24px"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-instagram" style="font-size:24px"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa fa-youtube-play" style="font-size:24px"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-4 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>
                        <p> {!! __('language.company_name') !!}</p>
                    </h6>
                    <p> {!! __('language.footer_description') !!}</p>

                </div>
                <!-- Grid column -->
                <div class="col-xl-1"></div>
                <!-- Grid column -->

                <div class="col-md-2 col-lg-3 col-xl-2 mx-auto mb-4  text-md-start me">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{ __('language.help') }}
                    </h6>
                    <p>
                        <a href="{{ route('about') }}" class="text-reset">{{ __('language.ab') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('privacy') }}" class="text-reset">{{ __('language.pr') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('terms') }}" class="text-reset">{{ __('language.te') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('returnpolicy') }}" class="text-reset">{{ __('language.re') }}</a>
                    </p>
                </div>


                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-xl-1"></div>

                <!-- Grid column -->

                <!-- Grid column -->

                <div class="col-md-6 col-lg-5 col-xl-4 mx-auto mb-4 text-md-start med">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">{{ __('language.contact') }}</h6>
                    <p class=""><i class="fa fa-map-marker" style="font-size:24px"></i>
                        <span class="ml-1">{{ $contact->address ?? '' }}</span>
                    <p class="">
                        <i class="fa fa-envelope" style="font-size:24px"></i>
                        {{ $contact->email ?? '' }}
                    </p>
                    <p class=""><i class="fa fa-phone" style="font-size:24px"></i>
                        <span class="ml-2">{{ $contact->mobile ?? '' }}</span>
                    </p>
                    {{--  --}}
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center d-flex justify-content-between p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        <div>
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="{{ route('index') }}">Marga-Net</a>
        </div>
        <div>
            Developed by: <a class="text-reset fw-bold" href="https://www.smartsoftware.com.bd/" target="_blank">Smart
                Software Ltd.</a>
        </div>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
