<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('front.page', $page->where('is_home', true)->first()) }}">
            <span class="align-middle">ST Barth Volley</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ Route::is('back-office.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('back-office.users.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.users.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-header">
                Contenu du site public
            </li>

            <li class="sidebar-item {{ Route::is('back-office.articles.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.articles.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Article</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('back-office.pages.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.pages.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Page</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('back-office.media.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.media.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Media</span>
                </a>
            </li>

            <li class="sidebar-header">
                Options du site public
            </li>

            <li class="sidebar-item {{ Route::is('back-office.menus.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.menus.index') }}">
                    <i class="align-middle" data-feather="menu"></i> <span class="align-middle">Menu</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::is('back-office.setting.*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('back-office.setting.index') }}">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Paramètres</span>
                </a>
            </li>
        </ul>
    </div>
</nav>