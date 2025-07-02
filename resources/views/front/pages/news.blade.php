@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => $page->title
    ])

    <section class="py-12 px-4 max-w-7xl mx-auto">
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
