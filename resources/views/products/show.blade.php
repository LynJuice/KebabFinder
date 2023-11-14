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
            @if ($review->user_id == auth()->user()->id)
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">Ištrinti</button>
            </form>
            @endif
            <hr>
            @endforeach
            {{ $reviews->links() }}

            @if (!App\Models\Review::where('user_id', auth()->user()->id)->where('product_id', $product->id)->exists())
            <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kebab_shop_id" value="{{ $product->id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="customRange2" class="form-label">Ivertinimas Balais</label>
                    <input name="rating" type="range" class="form-range" min="0" max="4" id="customRange2">

                    <textarea class="form-control" name="comment" placeholder="Komentaras" rows="3"></textarea>

                    <button type="submit">Prideti atsilepima</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Yra problemų su jūsų įvestais duomenimis.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection

@section("scripts")
@endsection

@section("styles")
@endsection