@extends('back-office.layout')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('back-office.pages.create') }}" class="btn btn-primary mb-3">Ajouter une page</a>

        <h1 class="h3 mb-3"><strong>Pages</strong> - Back Office</h1>


        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Liste des pages</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover my-0 align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Slug</th>
                            <th>Publié</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title ?? '-' }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->is_active ? 'Oui' : 'Non' }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-info">Voir</a>
                                <form method="POST" action="#" class="d-inline" onsubmit="return confirm('Supprimer cette page ?')">
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
