@extends('layouts.app')

@section('title', 'Products list')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Products</h1>


    <body>
        <div class="container mx-auto p-4">
            <div class="flex flex-wrap gap-6 justify-center">
                @foreach ($products as $product)
                    <a href="{{ route('show', $product->id) }}"
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $product->name }}</h5>

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->price }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <div class="flex items-center justify-center p-4">
                <ul class="inline-flex -space-x-px text-sm">
                    <li>
                        <a href="{{ $products->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <!-- Páginas -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ $products->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>

@endsection
