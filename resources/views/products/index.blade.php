@extends('layouts.admin_base')

@section('title', 'Produktai')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Produktai</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('table') }}"> Back</a>
        </div> -->
    </div>
</div>



<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>atsiliepimai</th>
                <th>Kebabinės</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($kebabProducts as $kebabProduct)
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebabProduct->name }}</strong></td>
                <td>{{ $kebabProduct->reviews }}</td>
                <td>{{ $kebabProduct->kebabShops }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
<script>

</script>
@endsection