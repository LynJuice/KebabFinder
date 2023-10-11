@extends('layouts.admin_base')

@section('title', 'KebabShop Table')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Kebabinių sąrašas</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('table') }}"> Back</a>
        </div> -->
    </div>
</div>





<div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Pavadinimas</th>
                    <th>Aprašas</th>
                    <th>Adresas</th>
                    <th>Telefonas</th>
                    <th>Atidarymo laikas</th>
                    <th>Uždarymo laikas</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($kebab_list as $kebab)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kebab->name }}</strong></td>
                    <td>{{ $kebab->description }}</td>
                    <td>{{ $kebab->address }}</td>
                    <td><span class="badge bg-label-primary me-1">{{ $kebab->phone }}</span></td>
                    <td>{{ $kebab->open_time }}</td>
                    <td>{{ $kebab->close_time }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void();"><i class="bx bx-edit-alt me-1"></i> Keisti</a>

                                <form method="POST" action="{{route('shops.destroy', $kebab) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"> <i class="bx bx-trash me-1"></i>  Trinti</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
@endsection

@section('scripts')

@endsection