<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot name="header">
        <x-breadcrumb href="{{ route('pesan.index') }}">Pesan</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>
    <x-alert></x-alert>

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-2 sm:p-5 antialiased">
        {{-- <div class="mx-auto max-w-screen-xl"> --}}
        <form action="/admin/pesan" method="post">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-3">
                <div>
                    <label for="group_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('pesan.group_id') }}
                    </label>
                    <select name="group_id" id="group"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="pesan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('pesan.group_id') }}
                    </label>
                    <textarea name="pesan" id="pesan" cols="30" rows="10"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('pesan.channel') }}
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <span
                            class="mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('pesan.telegram') }}</span>
                        <input type="checkbox" name="telegram" value="" class="sr-only peer" checked>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>

                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <span
                            class="mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('pesan.whatsapp') }}</span>
                        <input type="checkbox" name="whatsapp" value="" class="sr-only peer" checked>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>

                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <span
                            class="mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('pesan.email') }}</span>
                        <input type="checkbox" name="email" value="" class="sr-only peer" checked>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>

                    </label>
                </div>
            </div>

            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                {{ __('global.send') }}
            </button>
        </form>
    </section>
</x-backend.layout>
