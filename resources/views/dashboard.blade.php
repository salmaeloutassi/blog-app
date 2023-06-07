{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
</x-app-layout> --}}
@extends ('layouts.app')
@section('title', 'content')
    
@section('content')
    <div class="py-12  mx-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 text-green-700 text-lg font-bold">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
@endsection
