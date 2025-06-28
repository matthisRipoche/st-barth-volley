@extends('front.layout')

@section('content')
    @include('front.components.hero', [
        'title' => $article->title
    ])

    <section class="single-article py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- Image si présente --}}
                    @if ($article->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded">
                        </div>
                    @endif

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
