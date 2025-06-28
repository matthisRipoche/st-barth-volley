@extends('back-office.layout')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('back-office.articles.create') }}" class="btn btn-primary mb-3">Ajouter un article</a>

        <h1 class="h3 mb-3"><strong>Articles</strong> - Back Office</h1>


        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Liste des articles</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover my-0 align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Slug</th>
                            <th>Auteur</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title ?? '-' }}</td>
                            <td>{{ $article->slug }}</td>
                            <td>{{ $article->user->name ?? '-' }}</td>
                            <td>{{ $article->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $article->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('back-office.articles.show', $article) }}" class="btn btn-sm btn-info">Voir</a>
                                <form method="POST" action="{{ route('back-office.articles.delete', $article) }}" class="d-inline" onsubmit="return confirm('Supprimer cet article ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
@endsection
