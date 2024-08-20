@php
    use Illuminate\Support\Carbon;
@endphp
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
            <div class="text-base text-gray-500">
                <a href="#">Nanang Hermawan</a> | {{ $post->created_at }}
            </div>
            <p class="my-4 font-light">
                {{ $post->body }}
            </p>

            <a href="/blog/{{ $post->slug }}" class="font-medium text-blue-500 hover:underline">Readmore&raquo;</a>
        </article>
    @endforeach
</x-layout>
