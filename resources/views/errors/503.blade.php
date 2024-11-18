{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}

@extends('errors::layout')

@section('title', __('Service Unavailable'))
@section('code')
    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
        503</h1>
@endsection
@section('message')
    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Service Unavailable
    </p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Layanan Tidak tersedia
    </p>
@endsection
