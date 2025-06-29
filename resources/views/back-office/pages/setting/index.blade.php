@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Paramètres du site</h2>

        <form action="{{ route('back-office.setting.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="header_menu_id" class="form-label">Menu du header</label>
                <select name="header_menu_id" id="header_menu_id" class="form-select">
                    <option value="">-- Aucun --</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}"
                            {{ old('header_menu_id', $header_menu_id) == $menu->id ? 'selected' : '' }}>
                            {{ $menu->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="footer_menu_id" class="form-label">Menu du footer</label>
                <select name="footer_menu_id" id="footer_menu_id" class="form-select">
                    <option value="">-- Aucun --</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}"
                            {{ old('footer_menu_id', $footer_menu_id) == $menu->id ? 'selected' : '' }}>
                            {{ $menu->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
