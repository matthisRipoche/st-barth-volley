<footer>
    <div class="wrapper">
        <div class="image_container">
            <img src="{{ asset('images/logo-stbarth.jpeg') }}" alt="">
        </div>
        <div class="menu-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
            <ul>
                <li><a href="{{ route('front.mentions-legales') }}">Mentions légales</a></li>
                <li><a href="{{ route('front.plan-site') }}">Plan du site</a></li>
                <li><a href="{{ route('front.cookies') }}">Cookies</a></li>
                <li><a href="{{ route('front.contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
