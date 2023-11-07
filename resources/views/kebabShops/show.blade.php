@extends("layouts.base")

@section("title", $shop->name)

@section("content")
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>{{ $shop->name }}</h2>
                <h2>{{ $shop->address }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="text-center">
                <img src="{{ asset('images/diners/photos/' . $shop->image) }}" alt="{{ $shop->name }}" class="img-fluid">
            </div>

            <div class="text-center">
                <h2>Products</h2>
                <ul style="list-style-type: none;">
                    @foreach($shop->products as $product)
                    <li>
                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                        {{ $product->price }}€
                        <br>
                        <img src="{{ asset('images/diners/photos/' . $product->image) }}" alt="{{ $product->name }}" style="width: 25%">

                        <br>
                        {{ $product->description }}

                    </li>
                    <hr>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-6 margin-tb">
            <div class="text-center">
                <img src="{{ asset('images/diners/logos/' . $shop->logo) }}" alt="{{ $shop->name }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
@endsection

@section("styles")
@endsection