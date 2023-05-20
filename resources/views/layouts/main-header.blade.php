<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <p class="navbar-brand m-0">{{ __('navbar.project_name') }}</p>
    @if(auth()->check())
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard">{{ __('navbar.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/companies">{{ __('navbar.companies') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/employees">{{ __('navbar.employees') }}</a>
          </li>
          <li class="nav-item">
              <select class="form-control changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
            </select>
          </li>
        </ul>

      </div>
      <a style="display:inline" class="nav-link" 
          href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          {{ __('navbar.log_out') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @endif

    </li>
    @if(!auth()->check())
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login">{{ __('navbar.login') }}</a>
        </li>
        <li class="nav-item">
          <select class="form-control changeLang">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
        </select>
      </ul>
  @endif
  </div>
</nav>