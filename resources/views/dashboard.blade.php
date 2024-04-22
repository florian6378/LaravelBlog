<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <nav class="bg-white border-b border-gray-200 mb-8">
                <div class="container mx-auto flex items-center justify-between">
                    <div class="flex">
                        <a href="{{ route('posts.index') }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                        <a href="{{ route('categories.index') }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                        <a href="{{ route('mention') }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Mention légale</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">À propos</a>
                        <a href="{{ route('mesposts') }}" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Mes posts</a>
                    </div>
                </div>
            </nav>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
