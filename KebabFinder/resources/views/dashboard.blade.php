<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- if the user is a kebab admin, then show the kebab admin dashboard -->
    @if (Auth::user()->hasRole('kebabines administratorius'))
        <p>kebab admin</p>
    @else
    <p>user</p>
    @endif

</x-app-layout>
