@php
    $description = App\Models\backend\Webcontent::first();
@endphp
<style>
    /* @media (min-width: 768px) {
        .co {
            margin-right: 10rem;
        }
    } */
</style>

<div class="row m-4 ">
    <h2 class="d-flex justify-content-center">
        <p> {!! __('language.cardup') !!}</p>
    </h2>
    <hr>
    @foreach ($products as $product)
        <div class="col co">
            <div class="card mb-3" style="width: 18rem;">
                <img style="height: 200px" src="{{ asset('images/' . $product->image) }}" class="card-img-top"
                    alt="Product Image">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center">{{ $product->name }}</h5>
                    <p class="card-text d-flex justify-content-center">{{ __('language.price') }}: {{ $product->price }}
                    </p>
                    <div class="text-center">
                        <a href="{{ route('order', ['name' => $product->name, 'price' => $product->price, 'product_id' => $product->id, 'image' => $product->image]) }}"
                            class="btn btn-warning">{{ __('language.order_now') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


{{-- @php
    $description = App\Models\backend\Webcontent::first();
@endphp

<div class="row ml-5 mr-5 mt-5 mb-5">
    <h2 class="d-flex justify-content-center">
        @if ($description)
            <p>{!! $description->cardup !!}</p>
        @else
            <p>No description available</p>
        @endif
    </h2>
    <hr>
    @foreach ($products as $product)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img style="height: 200px" src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title d-flex justify-content-center">{{ $product->name }}</h5>
                    <p class="card-text d-flex justify-content-center">Price: {{ $product->price }}</p>
                    <div class="text-center">
                        <a href="{{ route('order', ['name' => $product->name, 'price' => $product->price, 'image' => $product->image]) }}" class="btn btn-warning">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
