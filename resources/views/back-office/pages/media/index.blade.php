@extends('back-office.layout')

@section('content')
    <section class="mediatheque">
        <h1 class="text-2xl font-bold mb-4">📁 Médiathèque</h1>

        <div class="head">
            {{-- Upload --}}
            <form action="{{ route('back-office.media.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6 flex items-center gap-4">
                @csrf
                <input type="file" name="file" required class="border p-2 rounded text-sm">
                <button type="submit" class="btn btn-primary">
                    ➕ Ajouter un média
                </button>
            </form>

            {{-- Sync --}}
            <form action="{{ route('back-office.media.sync') }}" method="POST" class="mb-6 flex items-center gap-4">
                @csrf
                <button type="submit" class="btn btn-primary mb-3">
                    Synchroniser les médias
                </button>
            </form>
        </div>

        {{-- Gallery --}}
        @if($media->count())
            <div class="liste-media">
                @foreach ($media as $item)
                <div class="media-item">
                    @if(Str::startsWith($item->mime_type, 'image'))
                        <img src="{{ $item->url }}" alt="{{ $item->name }}">
                    @else
                        <div class="media-file">
                            <img src="{{ asset('images/file-icon.png') }}" alt="Fichier" class="file-icon">
                            <p class="file-name">{{ $item->name }}</p>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center mt-8">Aucun média pour le moment 😔</p>
        @endif
    </section>
@endsection
