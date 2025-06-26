<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">ST Barth Volley</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('back-office.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('back-office.users.index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-header">
                Contenu du site
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('back-office.articles.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Article</span>
                </a>
            </li>
        </ul>
    </div>
</nav>