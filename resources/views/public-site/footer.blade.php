<footer>
    <div class="wrapper">
        <div class="image_container">
            <img src="{{ Vite::asset('resources/images/logo-stbarth.jpeg') }}" alt="">
        </div>
        <div class="menu-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
            <ul>
                <li><a href="{{ route('public-site.mentions-legales') }}">Mentions légales</a></li>
                <li><a href="{{ route('public-site.plan-site') }}">Plan du site</a></li>
                <li><a href="{{ route('public-site.cookies') }}">Cookies</a></li>
                <li><a href="{{ route('public-site.contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
