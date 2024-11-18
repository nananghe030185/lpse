<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot name="header">
        <x-breadcrumb href="{{ route('dashboard') }}">{{ __('dashboard.title') }}</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-2 sm:p-2 antialiased">
        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-2">
            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                    </svg>
                    <a href="{{ route('klpd.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($klpd) }} KLPD
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah KLPD (Kementrian, Lembaga, Pemerintah Daerah dan Instansi) yang terkumpul dalam database
                        kami
                    </p>
                    <a href="{{ route('klpd.index') }}"
                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>

            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                    </svg>
                    <a href="{{ route('lpse.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($lpse) }} LPSE
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah LPSE dari semua KLPD di seluruh Indonesia sebagai sumber Applikasi kami untuk
                        mengumpulkan data Paket Tender
                    </p>
                    <a href="{{ route('lpse.index') }}"
                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>

            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                    </svg>
                    <a href="{{ route('satker.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($satker) }} Satuan Kerja
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah Satuan Kerja (Satker) dari semua KLPD yang ada di seluruh Indonesia
                    </p>
                    <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>

            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                    </svg>
                    <a href="{{ route('tender.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($tender) }} Paket Tender LPSE
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah Paket Tender LPSE yang terkumpul dari seluruh Indonesia yang kami kirimkan sesuai kata
                        kunci yang anda inginkan
                    </p>
                    <a href="{{ route('tender.index') }}"
                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>
            {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div> --}}
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-2">

            <div class="mx-auto max-w-screen-xl">


                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                    </svg>
                    <a href="{{ route('lelang.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($lelang) }} Paket Lelang
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah Paket Lelang dari sirup sebagai informasi untuk anda sebelum paket tersebut
                        muncul di LPSE
                    </p>
                    <a href="{{ route('lelang.index') }}"
                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>

            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                    </svg>
                    <a href="{{ route('swakelola.index') }}">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                            {{ Number::format($swakelola) }} Paket Swakelola
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah Paket Swakelola dari sirup sebagai informasi untuk anda sebelum paket tersebut
                        muncul di LPSE
                    </p>
                    <a href="{{ route('swakelola.index') }}"
                        class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        {{ __('global.selengkapnya') }}
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>


            </div>

            <div class="mx-auto max-w-screen-xl">
                {{-- Card --}}
                <div class="card">
                    <svg class="w-6 h-6 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                            clip-rule="evenodd" />
                    </svg>
                    @can('admin')
                        <a href="{{ route('user.index') }}">
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white hover:text-blue-600">
                                {{ Number::format($users) }} Pengguna
                            </h5>
                        </a>
                    @else
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ Number::format($users) }} Pengguna
                            </h5>
                        </a>
                    @endcan

                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                        Jumlah Pengguna Applikasi kami yang telah terdaftar sampai saat ini
                    </p>
                    @can('admin')
                        <a href="{{ route('user.index') }}"
                            class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            {{ __('global.selengkapnya') }}
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    @else
                        <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            {{ __('global.selengkapnya') }}
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    @endcan
                </div>


            </div>


            {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h3
                    class="px-5 py-2 font-bold rounded-lg shadow border-gray-200 dark:text-white dark:border-gray-700 dark:bg-gray-800">
                    LPSE dengan jumlah
                    paket terbanyak Tahun
                    {{ Carbon\Carbon::now()->format('Y') }}
                </h3>
                {{-- TABEL LPSE dengan Proyek Terbanyak --}}
                <table class="w-full text-sm text-left text-gray-500 bg-white rounded-lg shadow dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-4/5">Nama LPSE</th>
                            <th scope="col" class="px-2 py-3">Jumlah Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="border-b dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <a href="{{ $data->link }}" class="text-blue-500 hover:underline"
                                        target="_blank">
                                        {{ $data->nama_lpse }}
                                    </a>
                                </td>
                                <td class="px-2 py-3 text-end">{{ Number::format($data->jumlah_paket) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">



                <table id="export-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Name
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th data-type="date" data-format="YYYY/DD/MM">
                                <span class="flex items-center">
                                    Release Date
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    NPM Downloads
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Growth
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Flowbite</td>
                            <td>2021/25/09</td>
                            <td>269000</td>
                            <td>49%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">React</td>
                            <td>2013/24/05</td>
                            <td>4500000</td>
                            <td>24%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Angular</td>
                            <td>2010/20/09</td>
                            <td>2800000</td>
                            <td>17%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Vue</td>
                            <td>2014/12/02</td>
                            <td>3600000</td>
                            <td>30%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Svelte</td>
                            <td>2016/26/11</td>
                            <td>1200000</td>
                            <td>57%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Ember</td>
                            <td>2011/08/12</td>
                            <td>500000</td>
                            <td>44%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Backbone</td>
                            <td>2010/13/10</td>
                            <td>300000</td>
                            <td>9%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">jQuery</td>
                            <td>2006/28/01</td>
                            <td>6000000</td>
                            <td>5%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Bootstrap</td>
                            <td>2011/19/08</td>
                            <td>1800000</td>
                            <td>12%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Foundation</td>
                            <td>2011/23/09</td>
                            <td>700000</td>
                            <td>8%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Bulma</td>
                            <td>2016/24/10</td>
                            <td>500000</td>
                            <td>7%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Next.js</td>
                            <td>2016/25/10</td>
                            <td>2300000</td>
                            <td>45%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Nuxt.js</td>
                            <td>2016/16/10</td>
                            <td>900000</td>
                            <td>50%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Meteor</td>
                            <td>2012/17/01</td>
                            <td>1000000</td>
                            <td>10%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Aurelia</td>
                            <td>2015/08/07</td>
                            <td>200000</td>
                            <td>20%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Inferno</td>
                            <td>2016/27/09</td>
                            <td>100000</td>
                            <td>35%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Preact</td>
                            <td>2015/16/08</td>
                            <td>600000</td>
                            <td>28%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Lit</td>
                            <td>2018/28/05</td>
                            <td>400000</td>
                            <td>60%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alpine.js</td>
                            <td>2019/02/11</td>
                            <td>300000</td>
                            <td>70%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Stimulus</td>
                            <td>2018/06/03</td>
                            <td>150000</td>
                            <td>25%</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Solid</td>
                            <td>2021/05/07</td>
                            <td>250000</td>
                            <td>80%</td>
                        </tr>
                    </tbody>
                </table>




            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">



                <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-5">
                        <div class="grid gap-4 grid-cols-2">
                            <div>
                                <h5
                                    class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                    Clicks
                                    <svg data-popover-target="clicks-info" data-popover-placement="bottom"
                                        class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div data-popover id="clicks-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth -
                                                Incremental</h3>
                                            <p>Report helps navigate cumulative growth of community activities. Ideally,
                                                the chart should have a growing trend, as stagnating chart signifies a
                                                significant decrease of community activity.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                            <p>For each date bucket, the all-time volume of activities is calculated.
                                                This means that activities in period n contain all activities up to
                                                period n, plus the activities generated by your community in period.</p>
                                            <a href="#"
                                                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg></a>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </h5>
                                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">42,3k</p>
                            </div>
                            <div>
                                <h5
                                    class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                    CPC
                                    <svg data-popover-target="cpc-info" data-popover-placement="bottom"
                                        class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div data-popover id="cpc-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">CPC growth -
                                                Incremental</h3>
                                            <p>Report helps navigate cumulative growth of community activities. Ideally,
                                                the chart should have a growing trend, as stagnating chart signifies a
                                                significant decrease of community activity.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                            <p>For each date bucket, the all-time volume of activities is calculated.
                                                This means that activities in period n contain all activities up to
                                                period n, plus the activities generated by your community in period.</p>
                                            <a href="#"
                                                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg></a>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </h5>
                                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">$5.40</p>
                            </div>
                        </div>
                        <div>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom" type="button"
                                class="px-3 py-2 inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Last
                                week <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="lastDaysdropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            7 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            30 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            90 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="line-chart"></div>
                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-2.5">
                        <div class="pt-5">
                            <a href="#"
                                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-3.5 h-3.5 text-white me-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z" />
                                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                </svg>
                                View full report
                            </a>
                        </div>
                    </div>
                </div>



            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
    </section>

    {{-- Table --}}
    <script>
        if (document.getElementById("export-table") && typeof simpleDatatables.DataTable !== 'undefined') {

            const exportCustomCSV = function(dataTable, userOptions = {}) {
                // A modified CSV export that includes a row of minuses at the start and end.
                const clonedUserOptions = {
                    ...userOptions
                }
                clonedUserOptions.download = false
                const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions)
                // If CSV didn't work, exit.
                if (!csv) {
                    return false
                }
                const defaults = {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                }
                const options = {
                    ...defaults,
                    ...clonedUserOptions
                }
                const separatorRow = Array(dataTable.data.headings.filter((_heading, index) => !dataTable.columns
                        .settings[index]?.hidden).length)
                    .fill("+")
                    .join("+"); // Use "+" as the delimiter

                const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

                if (userOptions.download) {
                    // Create a link to trigger the download
                    const link = document.createElement("a");
                    link.href = encodeURI("data:text/csv;charset=utf-8," + str);
                    link.download = (options.filename || "datatable_export") + ".txt";
                    // Append the link
                    document.body.appendChild(link);
                    // Trigger the download
                    link.click();
                    // Remove the link
                    document.body.removeChild(link);
                }

                return str
            }
            const table = new simpleDatatables.DataTable("#export-table", {
                template: (options, dom) => "<div class='" + options.classes.top + "'>" +
                    "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
                    (options.paging && options.perPageSelect ?
                        "<div class='" + options.classes.dropdown + "'>" +
                        "<label>" +
                        "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                        "</label>" +
                        "</div>" : ""
                    ) +
                    "<button id='exportDropdownButton' type='button' class='flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto'>" +
                    "Export as" +
                    "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                    "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
                    "</svg>" +
                    "</button>" +
                    "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700' data-popper-placement='bottom'>" +
                    "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                    "<li>" +
                    "<button id='export-csv' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export CSV</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-json' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm-.293 9.293a1 1 0 0 1 0 1.414L9.414 14l1.293 1.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Zm2.586 1.414a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1 0 1.414l-2 2a1 1 0 0 1-1.414-1.414L14.586 14l-1.293-1.293Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export JSON</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export TXT</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-sql' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path d='M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z'/>" +
                    "</svg>" +
                    "<span>Export SQL</span>" +
                    "</button>" +
                    "</li>" +
                    "</ul>" +
                    "</div>" + "</div>" +
                    (options.searchable ?
                        "<div class='" + options.classes.search + "'>" +
                        "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder +
                        "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ?
                            " aria-controls='" + dom.id + "'" : "") + ">" +
                        "</div>" : ""
                    ) +
                    "</div>" +
                    "<div class='" + options.classes.container + "'" + (options.scrollY.length ?
                        " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
                    "<div class='" + options.classes.bottom + "'>" +
                    (options.paging ?
                        "<div class='" + options.classes.info + "'></div>" : ""
                    ) +
                    "<nav class='" + options.classes.pagination + "'></nav>" +
                    "</div>"
            })
            const $exportButton = document.getElementById("exportDropdownButton");
            const $exportDropdownEl = document.getElementById("exportDropdown");
            const dropdown = new Dropdown($exportDropdownEl, $exportButton);
            console.log(dropdown)

            document.getElementById("export-csv").addEventListener("click", () => {
                simpleDatatables.exportCSV(table, {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                })
            })
            document.getElementById("export-sql").addEventListener("click", () => {
                simpleDatatables.exportSQL(table, {
                    download: true,
                    tableName: "export_table"
                })
            })
            document.getElementById("export-txt").addEventListener("click", () => {
                simpleDatatables.exportTXT(table, {
                    download: true
                })
            })
            document.getElementById("export-json").addEventListener("click", () => {
                simpleDatatables.exportJSON(table, {
                    download: true,
                    space: 3
                })
            })
        }
    </script>

    <script>
        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "line",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -26
                },
            },
            series: [{
                    name: "Clicks",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                    color: "#1A56DB",
                },
                {
                    name: "CPC",
                    data: [6456, 6356, 6526, 6332, 6418, 6500],
                    color: "#7E3AF2",
                },
            ],
            legend: {
                show: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("line-chart"), options);
            chart.render();
        }
    </script>





</x-backend.layout>
