<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our
                    LPSE</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test
                    assumptions and connect with the needs of your audience early and often.</p>
            </div>
            <div class="grid gap-8 md:grid-cols-2">
                @foreach ($lpses as $lpse)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end items-center mb-5 text-gray-500">
                            <span class="text-sm">{{ Carbon\Carbon::parse($lpse->created_at)->diffForHumans() }}</span>
                        </div>
                        <div class="flex gap-2">
                            <div>
                                <img class="w-14 h-14 rounded-full" src="{{ asset($lpse->logo) }}"
                                    alt="{{ $lpse->nama_lpse }}" />
                            </div>
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    <a href="/lpse/{{ $lpse->slug }}">{{ $lpse->nama_lpse }}</a>
                                </h2>
                                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $lpse->description }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-2">
                            <div class="flex gap-2 items-center space-x-4">
                                {{ Number::format($lpse->jumlah_paket, 0, 0, 'id-ID') }}
                                <span class="font-medium dark:text-white">
                                    Paket
                                </span>
                            </div>
                            <a href="/lpse/{{ $lpse->slug }}"
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
                @endforeach


            </div>
            <div class="flex justify-end">
                <div>
                    <form action="{{ route('lpse.index') }}">
                        <button
                            class="bg-blue-700 p-2 rounded-lg text-white font-semibold mt-2 w-32 inline-flex items-center">
                            Selanjutnya
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-layout>
