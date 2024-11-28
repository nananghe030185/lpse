<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- {{ dd($lpse->tenders) }} --}}
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/lpse/" class="font-medium text-sm text-blue-500 hover:underline">&laquo; Back to All
                    LPSE</a>

                <header class="mb-4 mt-5 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset($lpse->logo) }}"
                                alt="{{ $lpse->nama_lpse }}">
                            <div>
                                <a href="#" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $lpse->nama_lpse }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    <a href="/lpse/{{ $lpse->slug }}">{{ $lpse->nama_lpse }}</a>
                                </p>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    <time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $lpse->created_at }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-2xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $lpse->description }}</h1>
                </header>

                <div class="grid gap-8 md:grid-cols-2">
                    @foreach ($lpse->tenders as $i => $tender)
                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end items-center mb-5 text-gray-500">

                                <span class="text-sm">
                                    {{ Carbon\Carbon::parse($tender->tanggal_akhir_penawaran)->diffForHumans() }}
                                </span>
                            </div>
                            <div class="flex gap-2">
                                <div>
                                    <img class="w-14 h-14 rounded-full" src="{{ asset($tender->lpses->logo) }}"
                                        alt="{{ $tender->lpses->nama_lpse }}" />
                                </div>
                                <div>
                                    <a href="/lpse/{{ $tender->lpses->slug }}">{{ $tender->lpses->nama_lpse }}</a>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="/tender/{{ $tender->slug }}">
                                            {{ $tender->nama_paket }}</a>
                                    </h2>
                                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $tender->kategori }}
                                    </p>
                                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                        {{ Number::format($tender->pagu) }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-2">
                                <div class="flex gap-2 items-center space-x-4">
                                    {{-- {{ Number::format($tender->jumlah_paket, 0, 0, 'id-ID') }} --}}
                                    <span class="font-medium dark:text-white">
                                        Paket
                                    </span>
                                </div>
                                <a href="/tender/{{ $tender->slug }}"
                                    class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                    Read More
                                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        @if ($i == 3)
                            @break(true)
                        @endif
                    @endforeach
                </div>
            </article>
        </div>
    </main>

</x-layout>
