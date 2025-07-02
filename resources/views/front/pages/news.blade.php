@extends('front.layout')

@section('content')
    <section class="py-12 px-4 max-w-7xl mx-auto">
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-bold">{{ $page->title }}</h1>
            @if($page->description)
                <p class="mt-2 text-gray-600">{{ $page->description }}</p>
            @endif
        </header>

        @if($articles->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($articles as $article)
                    <article class="bg-white shadow rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <a href="#" class="text-blue-600 font-medium hover:underline">
                                Lire l’article →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

        @else
            <p class="text-center text-gray-500">Aucun article pour le moment 😢</p>
        @endif
    </section>
@endsection
