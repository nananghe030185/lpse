<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot name="header">
        <x-breadcrumb href="{{ route('lpse.index') }}">LPSE</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>

    <x-alert></x-alert>


    <!-- Start block -->
    <section class="bg-gray-50 h-auto dark:bg-gray-900 p-2 sm:p-4 antialiased">
        <div class="mx-auto max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <form action="{{ route('lpse.index') }}" method="POST">
                    @csrf
                    @method('get')
                    <div class="flex flex-col md:w-full md:flex-row p-3 gap-2">
                        <div class="flex-initial w-full md:w-96">
                            {{-- Input Search --}}
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" value="{{ request('search') }}" autofocus>
                            </div>
                        </div>
                        <div class="flex gap-2 md:w-full">

                            <div class="w-1/2 md:w-1/2">
                                <div class="w-full md:w-64">
                                    <button type="submit"
                                        class="flex items-center justify-center text-white w-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        Cari...
                                    </button>
                                </div>
                            </div>

                            <div class="w-1/2">
                                <div class="flex">
                                    <div class="md:w-full"></div>
                                    @can('admin')
                                        <div
                                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                            <button type="button" id="createLPSEModalButton"
                                                data-modal-target="createLPSEModal" data-modal-toggle="createLPSEModal"
                                                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                </svg>
                                                {{ __('global.addlpse') }}
                                            </button>

                                        </div>
                                    @endcan
                                </div>

                            </div>
                        </div>

                    </div>

                </form>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-4">State</th>
                                <th scope="col" class="px-4 py-3">Nama LPSE</th>
                                <th scope="col" class="px-4 py-3">Jumlah Paket</th>
                                <th scope="col" class="px-4 py-3">Jumlah Pagu</th>
                                <th scope="col" class="px-4 py-3">Slug</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->id }}</th>
                                    <td class="px-4 py-3">
                                        @if ($data->state)
                                            <svg class="w-6 h-6 text-green-800 dark:bg-gray-300 dark:rounded-full dark:text-green-800 dark:border-gray-600"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg class="w-6 h-6 text-red-800 dark:bg-gray-300 dark:rounded-full dark:text-red-800"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3"><a href="{{ $data->link }}" target="_blank"
                                            class="text-blue-700">{{ $data->nama_lpse }}</a></td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate text-end">
                                        {{ Number::format($data->jumlah_paket, 0, 0, 'id-ID') }}</td>
                                    <td class="px-4 py-3 text-end">
                                        {{ Number::format($data->jumlah_pagu, 0, 0, 'id-ID') }}</td>
                                    <td class="px-4 py-3">{{ $data->slug }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="apple-imac-{{ $data->id }}-dropdown-button"
                                            data-dropdown-toggle="apple-imac-{{ $data->id }}-dropdown"
                                            class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="apple-imac-{{ $data->id }}-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm"
                                                aria-labelledby="apple-imac-{{ $data->id }}-dropdown-button">
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="readLPSEModal{{ $data->id }}"
                                                        data-modal-toggle="readLPSEModal{{ $data->id }}"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                            viewbox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                        Preview
                                                    </button>
                                                </li>
                                                @can('admin')
                                                    <li>
                                                        <button type="button"
                                                            data-modal-target="updateLPSEModal{{ $data->id }}"
                                                            data-modal-toggle="updateLPSEModal{{ $data->id }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                                viewbox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path
                                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                            </svg>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button"
                                                            data-modal-target="deleteModal{{ $data->id }}"
                                                            data-modal-toggle="deleteModal{{ $data->id }}"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                            <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    fill="currentColor"
                                                                    d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Update modal -->
                                <div id="updateLPSEModal{{ $data->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    {{ __('lpse.edit') }}</h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="updateLPSEModal{{ $data->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="/admin/lpse/{{ $data->id }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" value="{{ $data->id }}" />
                                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                    {{-- <div>
                                                        <label for="lpse_id"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.kode') }}</label>
                                                        <input type="text" name="lpse_id" id="lpse_id"
                                                            value="{{ $data->lpse_id }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="{{ __('lpse.kode') }}">
                                                    </div> --}}
                                                    <div>
                                                        <label for="nama_lpse"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.name') }}</label>
                                                        <input type="text" name="nama_lpse" id="nama_lpse"
                                                            value="{{ $data->nama_lpse }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="{{ __('lpse.name') }}">
                                                    </div>
                                                    <div>
                                                        <label for="slug"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.slug') }}</label>
                                                        <input type="text" name="slug" id="slug"
                                                            value="{{ $data->slug }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="{{ __('lpse.slug') }}">
                                                    </div>
                                                    <div>
                                                        <label for="link"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.link') }}</label>
                                                        <input type="text" name="link" id="link"
                                                            value="{{ $data->link }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="{{ __('lpse.link') }}">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.description') }}</label>
                                                        <textarea id="description" rows="5" name="description"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="{{ __('lpse.description') }}">{{ $data->description }}</textarea>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.logo') }}</label>
                                                        <input type="file" name="logo" id="logo"
                                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                            aria-describedby="file_input_help">
                                                        <small
                                                            class="mt-1 text-sm text-gray-500 dark:text-gray-300 font-thin"
                                                            id="file_input_help">
                                                            PNG,JPG or GIF (MAX. 800x400px).</small>
                                                    </div>
                                                    <div>
                                                        <label class="inline-flex items-center cursor-pointer">
                                                            <span
                                                                class="mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('global.state') }}</span>
                                                            <input type="checkbox" name="state" value=""
                                                                class="sr-only peer"
                                                                @if ($data->state) checked @endif>
                                                            <div
                                                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <button type="submit"
                                                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Read modal -->
                                <div id="readLPSEModal{{ $data->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <!-- Modal header -->
                                            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                    <h3 class="font-semibold ">{{ $data->nama_lpse }}</h3>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="readLPSEModal{{ $data->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <dl>
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    {{ __('lpse.name') }}</dt>
                                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                    {{ $data->nama_lpse }}</dd>
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    {{ __('lpse.slug') }}
                                                </dt>
                                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                    {{ $data->slug }}</dd>
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    {{ __('lpse.link') }}

                                                </dt>
                                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                    <a href="{{ $data->link }}"
                                                        class="text-blue-700 hover:font-bold" target="_blank">
                                                        {{ $data->link }}
                                                    </a>
                                                </dd>
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    {{ __('lpse.description') }}
                                                </dt>
                                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                    {{ $data->description }}
                                                </dd>

                                            </dl>
                                            <div class="flex justify-between items-center">
                                                <button type="button"
                                                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                    data-modal-toggle="readLPSEModal{{ $data->id }}">
                                                    {{ __('global.close') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete modal -->
                                <div id="deleteModal{{ $data->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <form action="/admin/lpse/{{ $data->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div
                                                class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <button type="button"
                                                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="deleteModal{{ $data->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                    aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">
                                                    {{ __('global.confirm.delete') }}
                                                </p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteModal{{ $data->id }}"
                                                        type="button"
                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        {{ __('global.cancel') }}
                                                    </button>
                                                    <button type="submit"
                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        {{ __('global.delete') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $datas->links() }}
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Create modal -->
    <div id="createLPSEModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Tambah LPSE') }}</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-target="createLPSEModal" data-modal-toggle="createLPSEModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('lpse.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="lpse_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.kode') }}</label>
                            <input type="number" name="lpse_id" id="lpse_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('lpse.kode') }}" required="">
                        </div>
                        <div>
                            <label for="nama_lpse"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.nama') }}</label>
                            <input type="text" name="nama_lpse" id="nama_lpse"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('lpse.nama') }}" required="">
                        </div>
                        <div>
                            <label for="slug"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.slug') }}</label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('lpse.slug') }}" required="">
                        </div>
                        <div>
                            <label for="link"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.link') }}</label>
                            <input type="text" name="link" id="link"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('lpse.link') }}" required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.description') }}</label>
                            <textarea id="description" rows="5" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('lpse.description') }}">{{ $data->description }}</textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('lpse.logo') }}</label>
                            <input type="file" name="logo" id="logo"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help">
                            <small class="mt-1 text-sm text-gray-500 dark:text-gray-300 font-thin"
                                id="file_input_help">
                                PNG,JPG or GIF (MAX. 800x400px).</small>
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
                        {{ __('global.save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-backend.layout>