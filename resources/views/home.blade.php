@extends('layouts.app')

@section('content')
    <main class="container mx-auto mt-6 flex gap-6">
        <!-- Blog Posts Section -->
        <section class="w-3/4 bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Latest Posts</h2>

            <div class="space-y-6">
                @foreach ($posts as $post)
                    <article class="flex gap-4 border-b pb-4">
                        <img src="{{ asset('https://placehold.co/600x400') }}" alt="Post Image"
                            class="w-32 h-32 object-cover rounded">

                        <div>
                            <h3 class="text-lg font-semibold">
                                @if (Route::has('post.show'))
                                    <a href="{{ route('post.show', $post->id) }}"
                                        class="hover:underline">{{ $post->title }}</a>
                                @else
                                    {{ $post->title }}
                                @endif
                            </h3>
                            <p class="text-gray-600">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->text), 100) }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- Sidebar Section -->
        <aside class="w-1/4 bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Categories</h2>
            <ul class="space-y-2">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('home', ['category_id' => $category->id]) }}"
                            class="text-gray-600 hover:text-gray-800">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </main>
@endsection
