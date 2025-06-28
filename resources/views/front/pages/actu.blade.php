@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => 'Actualités du club'
    ])
    <section class="liste-actu">
        <div class="container">
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <a href="{{ route('front.single-article', $article) }}" class="btn btn-primary">Lire
                                l'article</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection