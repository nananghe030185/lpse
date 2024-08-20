<x-backend.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight lg:px-5 md:px-5 sm:px-2 xsm:px-2">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Dahsboard') }}
                </div>
            </div>
        </div>
    </div>
</x-backend.layout>
