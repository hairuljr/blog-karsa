<style>
  .buttonku {
  font-size: 11px;
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
  padding-left: 20px;
  padding-right: 20px;
  font-weight: 400;
  color: #000000;
  text-transform: uppercase;
  letter-spacing: 2px;
  opacity: 1 !important;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Karsa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item {{ (request()->segment(1) == '') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link mt-3 mb-3 my-2 py-2">Home</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == '#') ? 'active' : '' }}">
          <a href="//event.yogyakarsa.com" class="nav-link mt-3 mb-3 my-2 py-2">Event</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'blog') ? 'active' : '' }}">
          <a href="{{ url('/blog') }}" class="nav-link mt-3 mb-3 my-2 py-2">Blog</a>
        </li>
        <li class="nav-item">
          @guest
          <form>
            @csrf
            @if (request()->segment(1) == 'login')
              <button class="buttonku btn btn-outline-success mt-3 mb-3 my-2 py-2" type="button" onclick="event.preventDefault(); location.href='{{url('register')}}';">Daftar</button>
            @else
              <button class="buttonku btn btn-outline-success mt-3 mb-3 my-2 py-2" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';">Login</button>
            @endif
          </form>
          @endguest

          @auth
          @if (Auth::user()->roles === "ADMIN")
            <li class="nav-item">
              <a href="{{ url('admin') }}" class="nav-link mt-3 mb-3 my-2 py-2">Dashboard</a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link mt-3 mb-3 my-2 py-2">Dashboard</a>
            </li>
          @endif
          <form method="POST" action="{{ url('logout') }}">
            @csrf
            <button class="buttonku btn btn-outline-success  mt-3 mb-3 my-2 py-2" type="submit"><i class="fa fa-fw fa-power-off" aria-hidden="true"></i></button>
          </form>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->