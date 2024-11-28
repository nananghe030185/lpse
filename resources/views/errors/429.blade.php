{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}

@extends('errors::layout')

@section('title', __('Too Many Requests'))
@section('code')
    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
        429</h1>
@endsection
@section('message')
    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Too Many Requests
    </p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Terlalu banyak permintaan halaman
    </p>
@endsection
