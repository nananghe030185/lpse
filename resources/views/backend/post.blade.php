<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot name="header">
        <x-breadcrumb href="{{ route('post.index') }}">Artikel</x-breadcrumb>
    </x-slot>
    <x-slot:logo>{{ $setting }}</x-slot:logo>

    <x-alert></x-alert>

    <section class="bg-gray-50 {{ request('search') ? 'h-screen' : '' }} dark:bg-gray-900 p-2 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md rounded-lg overflow-hidden">
                <form action="/admin/post" method="post">
                    @csrf
                    <div class="flex flex-col md:flex-row justify-end space-y-3 md:space-y-0 md:space-x-4 p-2">
                        <button type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-40">
                            {{ __('global.save') }}
                        </button>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-2">
                        <div class="relative w-full md:w-8/12">
                            <label for="title" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Title
                            </label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Title" value="" autofocus>
                        </div>
                        <div class="w-full md:w-4/12">
                            <label for="slug" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Slug
                            </label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Slug" value="" autofocus>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-2"">
                        <div class="relative w-full md:w-8/12">
                            <label for="body" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                Body
                            </label>
                            <input id="body" type="hidden" name="body" value="" class="h-3/4">
                            <trix-editor input="body" class="h-96 overflow-y-scroll"></trix-editor>
                        </div>
                        <div class="w-full md:w-4/12 flex flex-col gap-2">
                            <div class="w-full">
                                <label for="category" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Category
                                </label>
                                <select name="category" id="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach ($categories as $id => $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="description"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Meta Description
                                </label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-backend.layout>
