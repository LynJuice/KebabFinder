@extends('layouts.admin_base')

@section('title', 'Kebab Produktai')

@section('content')

{{ $kebab_products }}
<br>
<br>
<br>
{{ $user_products }}


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kebab Produktai</h2>
        </div>
        <!-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('table') }}"> Back</a>
        </div> -->
    </div>
</div>

<div class="card">
    <h5 class="card-header">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Atsiliepimai</th>
                        <th>Kebabinės</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>NAME HERE</strong></td>
                        <td>
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100">
                                </div>
                                <div class="ms-3"></div>
                            </div>
                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Keisti</a></button>
                                    <button type="button" class="dropdown-item"><i class="bx bx-trash me-1"></i> Trinti</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </h5>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection