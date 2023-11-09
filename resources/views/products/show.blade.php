@extends("layouts.base")

@section("title", $product->name)

@section("content")
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2><strong>{{ $product->name }}</strong></h2>
                <h2>{{ $product->description }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="text-center">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
        </div>
        <div class="col-lg-6 margin-tb">
            <hr>
            <h1 class="text-center"> Atsilepimai </h1>
            @foreach($reviews as $review)
            {{$review->user->name}}
            <div class="progress mb-3">
                <div class="progress-bar bg-danger" style="width: {{ $review->rating * 10 *2}}%;" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-label"> {{$review->rating}} </div>
                </div>
            </div>
            {{$review->comment}}
            <br>
            <hr>
            @endforeach        
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@endsection

@section("scripts")
@endsection

@section("styles")
@endsection