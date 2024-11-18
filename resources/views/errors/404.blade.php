@extends('errors::layout')

@section('title', __('Not Found'))
@section('code')
    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
        404</h1>
@endsection
@section('message')
    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Page Not Found
    </p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Halaman yang anda cari tidak ditemukan
    </p>
@endsection
