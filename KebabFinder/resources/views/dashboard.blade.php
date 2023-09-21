@extends("layouts.base")

@section("title", "Home")

@section("content")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Auth::user()->hasRole('kebabines administratorius'))
    <!-- Kebabu adminstaratoriaus dashboard -->
    <p>kebabu admin</p>
    <div class="container">
        <button type="button" class="btn btn-primary">Keisti Kebabiniu informacija</button>
        <button type="button" class="btn btn-primary">Prideti nauja kebabine</button>
        <button type="button" class="btn btn-danger">Prideti Naikinti kebabine</button>
    </div>
    @else
    <!-- Cia bus userio vaizdas -->
    <p>user</p>
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