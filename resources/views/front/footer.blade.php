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

        </div>
    </div>
</footer>
