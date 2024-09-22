<div class="app-header d-flex align-items-center sticky-top">

    <!-- Toggle buttons start -->
    <div class="d-flex">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="bi bi-list lh-1"></i>
        </button>
        <button class="pin-sidebar" id="pin-sidebar">
            <i class="bi bi-list lh-1"></i>
        </button>
    </div>
    <!-- Toggle buttons end -->

    <!-- App brand starts -->
    <div class="app-brand py-2 ms-3">
        <a href="/" class="d-sm-block d-none">
            <img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="Bootstrap Gallery" />
        </a>
        <a href="index.html" class="d-sm-none d-block">
            <img src="{{ asset('assets/images/logo-sm.svg') }}" class="logo" alt="Bootstrap Gallery" />
        </a>
    </div>
    <!-- App brand ends -->

    <!-- App header actions start -->
    <div class="header-actions col">
        <div class="d-lg-flex d-none">
            <!-- Rest of the dropdown menus -->
        </div>
        <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
               href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ Auth::user()->getMedia('profile-images')->first() ? Auth::user()->getMedia('profile-images')->first()->getUrl() : asset('assets/images/user.png') }}"
                     class="rounded-2 img-3x" alt="Profile Image" />
                <div class="ms-2 text-truncate d-lg-block d-none">
                    <span>{{ Auth::user()->name }}</span><br>
                    <span><strong>{{ Auth::user()->roles->pluck('name')->join(', ') }}</strong></span>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <div class="header-action-links mx-3 gap-2">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person text-primary"></i>Profile
                    </a>
                </div>
                <div class="mx-3 mt-2 d-grid">
                    <a href="{{ route('logout') }}" class="btn btn-primary btn-sm"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- App header actions end -->

</div>
<!-- App header ends -->
