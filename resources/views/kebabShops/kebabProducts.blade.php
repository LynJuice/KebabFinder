@extends('layouts.admin_base')

@section('title', 'Kebabines Produktai')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $kebab_info->name }} - Produktai</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('table') }}"> Back</a>
        </div> -->
    </div>
</div>

<div class="card">
    <h5 class="card-header">
        <div class="table-responsive">

        

            <form action="{{ route('shops.products.store', $kebab_info) }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Pavadinimas</th>
                            <th class="text-center">Atsiliepimai</th>
                            <th class="text-center">Kebabinės</th>
                            <th class="text-center">Produktas Priskirtas</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($user_products as $product)
                        <tr>
                            <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->name }}</strong></td>
                            <td>
                                <div class="progress mb-3 text-center">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <div class="ms-3"></div>
                                </div>
                            </td>
                            <td>

                                @foreach ($product->kebabShops as $kebabShop)
                                <div class="text-center"> {{ $kebabShop->id }} - {{$kebabShop->name}} </div>
                                @endforeach

                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="products[]" value="{{ $product->id }}" @if($kebab_products->contains($product->id)) checked @endif>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
        </div>
    </h5>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection