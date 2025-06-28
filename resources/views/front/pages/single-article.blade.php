@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => $article->title
    ])

    <section class="single-article">
        <div class="smallwrapper">

            {{-- Navigation --}}
            <div class="">
                <a class="btn btn-primary" href="{{ route('front.actu') }}" >Retour à l'actualité</a>
            </div>

            {{-- Meta info --}}
            <p class="text-muted mb-2">
                Publié le {{ $article->created_at->format('d/m/Y') }}
                @if ($article->user)
                    par {{ $article->user->name }}
                @endif
            </p>

            {{-- Contenu --}}
            <div class="content mb-5">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>
    </section>
@endsection