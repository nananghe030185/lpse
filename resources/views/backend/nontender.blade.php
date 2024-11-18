<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot name="header">
        <x-breadcrumb href="{{ route('nontender') }}">Non Tender</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>

    <x-alert></x-alert>
</x-backend.layout>
