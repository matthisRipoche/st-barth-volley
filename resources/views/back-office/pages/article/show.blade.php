@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Modifier l’article</h2>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Spoofing PUT method --}}

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" required>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $article->slug) }}">
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if ($article->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Image actuelle" style="max-width: 200px;">
                    </div>
                @endif
                <input class="form-control" type="file" id="image" name="image">
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('back-office.articles.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection
