<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
    <!-- if the user is a kebab admin, then show the kebab admin dashboard -->
    @if (Auth::user()->hasRole('kebabines administratorius'))
        <p>kebab admin</p>
    @else
    <p>user</p>
    @endif

=======
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-map />
            </div>
        </div>
    </div>
>>>>>>> dovydo
</x-app-layout>
