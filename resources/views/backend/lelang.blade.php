<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot name="header">
        <x-breadcrumb href="{{ route('lelang.index') }}">Lelang</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>

    <x-alert></x-alert>

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-2 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex w-full flex-col md:flex-row gap-2 px-2 py-2 mx-2">
                    <div class="w-full md:w-8/12">
                        {{-- Input Search --}}
                        <form action="{{ route('lelang.index') }}" method="POST">
                            @csrf
                            @method('get')
                            <div class="flex flex-col md:flex-row gap-2">
                                <div class="w-full md:w-3/4">
                                    {{-- Input Search --}}
                                    <div>
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor" viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                                    {{-- End Input Search --}}
                                </div>
                                <div class="flex flex-row justify-between w-full md:1/4 gap-2">
                                    {{-- Filter --}}
                                    <div>
                                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Kategori
                                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        </button>
                                        <div id="filterDropdown"
                                            class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Metode
                                                Pemilihan
                                            </h6>
                                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                                <li class="flex items-center">
                                                    <input id="pengadaanlangsung" type="checkbox" value=""
                                                        name="pengadaanlangsung"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('pengadaanlangsung') || request()->has('pengadaanlangsung')) checked @endif>
                                                    <label for="pengadaanlangsung"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Pengadaan Langsung
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="penunjukanlangsung" type="checkbox" value=""
                                                        name="penunjukanlangsung"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('penunjukanlangsung') || request()->has('penunjukanlangsung')) checked @endif>
                                                    <label for="penunjukanlangsung"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Penunjukan Langsung
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="epurchasing" type="checkbox" value=""
                                                        name="epurchasing"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('epurchasing') || request()->has('epurchasing')) checked @endif>
                                                    <label for="epurchasing"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        E-Purchasing
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="dikecualikan" type="checkbox" value=""
                                                        name="dikecualikan"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('dikecualikan') || request()->has('dikecualikan')) checked @endif>
                                                    <label for="dikecualikan"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Dikecualikan
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="tender" type="checkbox" value="" name="tender"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('tender') || request()->has('tender')) checked @endif>
                                                    <label for="tender"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Tender
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="tendercepat" type="checkbox" value=""
                                                        name="tendercepat"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('tendercepat') || request()->has('tendercepat')) checked @endif>
                                                    <label for="tendercepat"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Tender Cepat
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="seleksi" type="checkbox" value=""
                                                        name="seleksi"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('seleksi') || request()->has('seleksi')) checked @endif>
                                                    <label for="seleksi"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Seleksi
                                                    </label>
                                                </li>
                                                <li class="flex items-center">
                                                    <input id="kontes" type="checkbox" value=""
                                                        name="kontes"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                        @if (request('kontes') || request()->has('kontes')) checked @endif>
                                                    <label for="kontes"
                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        Kontes
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <select name="waktu_pemilihan" id="waktu_pemilihan"
                                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"">
                                        <option value="">Waktu Pemilihan</option>
                                        <option value="January {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'January ' . date('Y')) @selected(true) @endif>
                                            January {{ date('Y') }}
                                        </option>
                                        <option value="February {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'February ' . date('Y')) @selected(true) @endif>
                                            February {{ date('Y') }}
                                        </option>
                                        <option value="March {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'March ' . date('Y')) @selected(true) @endif>
                                            March {{ date('Y') }}</option>
                                        <option value="April {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'April ' . date('Y')) @selected(true) @endif>
                                            April {{ date('Y') }}</option>
                                        <option value="May {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'May ' . date('Y')) @selected(true) @endif>May
                                            {{ date('Y') }}</option>
                                        <option value="June {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'June ' . date('Y')) @selected(true) @endif>June
                                            {{ date('Y') }}</option>
                                        <option value="July {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'July ' . date('Y')) @selected(true) @endif>July
                                            {{ date('Y') }}</option>
                                        <option value="August {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'August ' . date('Y')) @selected(true) @endif>
                                            August {{ date('Y') }}
                                        </option>
                                        <option value="September {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'September ' . date('Y')) @selected(true) @endif>
                                            September {{ date('Y') }}
                                        </option>
                                        <option value="October {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'October ' . date('Y')) @selected(true) @endif>
                                            October {{ date('Y') }}
                                        </option>
                                        <option value="November {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'November ' . date('Y')) @selected(true) @endif>
                                            November {{ date('Y') }}
                                        </option>
                                        <option value="December {{ date('Y') }}"
                                            @if (request('waktu_pemilihan') == 'December ' . date('Y')) @selected(true) @endif>
                                            December {{ date('Y') }}
                                        </option>
                                    </select>
                                    <button type="submit"
                                        class="flex items-center justify-center text-white w-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        Cari...
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-4/12 flex md:justify-end">
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center justify-end md:space-x-3 flex-shrink-0 mr-4">
                            @can('admin')
                                <form action="/api/lelang" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        Reload Data Lelang
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>



                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-4">Kode RUP</th>
                                <th scope="col" class="px-4 py-3">Nama Paket</th>
                                <th scope="col" class="px-4 py-3">Pagu</th>
                                <th scope="col" class="px-4 py-3">Metode Pemilihan</th>
                                <th scope="col" class="px-4 py-3">Waktu Pemilihan</th>
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
                                    <td class="px-4 py-3">{{ $data->kd_rup }}</td>
                                    <td class="px-4 py-3 text-blue-700 hover:text-blue-800">
                                        <a href="https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/{{ $data->kd_rup }}"
                                            target="_blank">{{ $data->nama_paket }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate text-end">
                                        Rp.{{ Number::format($data->pagu, 0, 0, 'id-ID') }}</td>
                                    <td class="px-4 py-3">
                                        {{ $data->metode_pemilihan }}</td>
                                    <td class="px-4 py-3 text-end">
                                        {{ $data->waktu_pemilihan }}</td>
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
                                                    <form action="/admin/lelang" method="post">
                                                        @csrf
                                                        <input type="hidden" name="nama_paket"
                                                            value="{{ $data->nama_paket }}">
                                                        <input type="hidden" name="kd_rup"
                                                            value="{{ $data->kd_rup }}">
                                                        <input type="hidden" name="kd_satker"
                                                            value="{{ $data->kd_satker }}">
                                                        <button type="submit"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                            <svg class="w-4 h-4 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path
                                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                            </svg>
                                                            {{ __('global.pin') }}
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        data-modal-target="readLelangModal{{ $data->id }}"
                                                        data-modal-toggle="readLelangModal{{ $data->id }}"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                            viewbox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                        {{ __('global.preview') }}
                                                    </button>
                                                </li>
                                                @can('admin')
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
                                                            {{ __('global.delete') }}
                                                        </button>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Read modal -->
                                <div id="readLelangModal{{ $data->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    {{ $data->nama_paket }}
                                                </h3>

                                                <div>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="readLelangModal{{ $data->id }}">
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
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.kd_rup') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->kd_rup }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.klpd') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->klpd->nama_klpd }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.satker') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->satker->nama_satker }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.pagu') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        Rp. {{ Number::format($data->pagu, 0, 0, 'id-ID') }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.metode_pemilihan') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->metode_pemilihan }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.sumber_dana') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->sumber_dana }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                        {{ __('lelang.waktu_pemilihan') }} :
                                                    </label>
                                                    <div class="dark:text-slate-100">
                                                        {{ $data->waktu_pemilihan }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <div class="flex items-center space-x-3 sm:space-x-4">
                                                    <a href="https://sirup.lkpp.go.id/sirup/home/detailPaketPenyediaPublic2017/{{ $data->kd_rup }}"
                                                        target="_blank"
                                                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                        {{ __('global.tolink') }}
                                                    </a>

                                                </div>
                                                <button type="button"
                                                    data-modal-toggle="readLelangModal{{ $data->id }}"
                                                    class="inline-flex
                                                    items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4
                                                    focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm
                                                    px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600
                                                    dark:focus:ring-red-900">
                                                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1"
                                                        fill="currentColor" viewbox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
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
                                        <form action="/admin/lelang/{{ $data->id }}" method="post">
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
                                                        {{ __('global.cancel') }}</button>
                                                    <button type="submit"
                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        {{ __('global.delete') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation"> --}}
                {{ $datas->links() }}
                {{-- </nav> --}}
            </div>
        </div>
    </section>
    <!-- End block -->


</x-backend.layout>