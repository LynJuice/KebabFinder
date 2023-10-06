@extends('layouts.admin_base')

@section('title', 'KebabShop Table')

@section('content')
    <div class="card">
        <h5 class="card-header">Kebabines</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>name</th>
                    <th>description</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>open time</th>
                    <th>close time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($kebab_list as $kebab)
                    @include('kebab_component')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection
