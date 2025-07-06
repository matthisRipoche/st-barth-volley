@extends('back-office.layout')

@section('content')
    <div class="container py-5">

        <form action="{{ route('back-office.articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ old('title', $article->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                               value="{{ old('slug', $article->slug) }}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Image associée</label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id', $article->media_id) }}">
                            <img id="media_preview" src="{{ $article->media?->url ?? 'https://via.placeholder.com/160' }}"
                                alt="Preview" class="rounded border" width="80" height="80">
                            <button type="button" class="btn btn-outline-primary openMediaModal">
                                Choisir un média
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="{{ route('back-office.articles.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('modals')
    @include('back-office.modals.media.modal-mediatheque', ['media' => $media])
@endsection