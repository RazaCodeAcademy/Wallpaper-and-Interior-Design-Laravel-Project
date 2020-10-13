<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
    <a class="navbar-brand" href="/"><h1 class="nav-h1-style">Lubaba Interior</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse header-nav" id="navbarNavDropdown">
	    <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">HOME<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">LOGIN<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('register') }}">REGISTER<span class="sr-only"></span></a>
            </li>
	    </ul>
	</div>
</nav>
