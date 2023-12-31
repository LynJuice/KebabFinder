@extends("layouts.base")

@section("title", "Home")

@section("content")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Auth::user()->hasRole('kebabines administratorius') || Auth::user()->hasRole('svetaines administratorius'))
    <br>
    <br>
    <div class="text-center">
        <a href="/admin" class="btn btn-primary">Administravimas</a>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-map />
            </div>
        </div>
    </div>
</x-app-layout>

@section("styles")
@endsection