{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@extends('errors::layout')

@section('title', __('Forbidden'))
@section('code')
    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
        403</h1>
@endsection
@section('message')
    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Forbidden
    </p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Anda tidak diijinkan mengakses halaman ini
    </p>
@endsection
