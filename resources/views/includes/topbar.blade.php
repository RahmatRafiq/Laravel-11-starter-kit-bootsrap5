{{-- <!-- App header starts -->
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
        <a href="index.html" class="d-sm-block d-none">
            <img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="Bootstrap Gallery" />
        </a>
        <a href="index.html" class="d-sm-none d-block">
            <img src="{{ asset('assets/images/logo-sm') }}.svg" class="logo" alt="Bootstrap Gallery" />
        </a>
    </div>
    <!-- App brand ends -->

    <!-- App header actions start -->
    <div class="header-actions col">
        <div class="d-lg-flex d-none">
            <div class="dropdown">
                <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-grid fs-4 lh-1 text-secondary"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg">
                    <!-- Row start -->
                    <div class="d-flex gap-2 m-2">
                        <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                            <img src="{{ asset('assets/images/brand-behance') }}.svg" class="img-3x"
                                alt="Admin Themes" />
                        </a>
                        <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                            <img src="{{ asset('assets/images/brand-gatsby') }}.svg" class="img-3x"
                                alt="Admin Themes" />
                        </a>
                        <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                            <img src="{{ asset('assets/images/brand-google') }}.svg" class="img-3x"
                                alt="Admin Themes" />
                        </a>
                        <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                            <img src="{{ asset('assets/images/brand-bitcoin') }}.svg" class="img-3x"
                                alt="Admin Themes" />
                        </a>
                        <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                            <img src="{{ asset('assets/images/brand-dribbble') }}.svg" class="img-3x"
                                alt="Admin Themes" />
                        </a>
                    </div>
                    <!-- Row end -->
                </div>
            </div>
            <div class="dropdown border-start">
                <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-exclamation-triangle fs-4 lh-1 text-secondary"></i>
                    <span class="count-label warning"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg">
                    <h5 class="fw-semibold px-3 py-2 text-primary">
                        Notifications
                    </h5>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <div class="icon-box md bg-success rounded-circle me-3">
                                <i class="bi bi-exclamation-triangle text-white fs-4"></i>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Rosalie Deleon</h6>
                                <p class="mb-1">You have new order.</p>
                                <p class="small m-0 text-secondary">30 mins ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <div class="icon-box md bg-danger rounded-circle me-3">
                                <i class="bi bi-exclamation-octagon text-white fs-4"></i>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Donovan Stuart</h6>
                                <p class="mb-1">Membership has been expired.</p>
                                <p class="small m-0 text-secondary">2 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2">
                            <div class="icon-box md bg-warning rounded-circle me-3">
                                <i class="bi bi-exclamation-square text-white fs-4"></i>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Roscoe Richards</h6>
                                <p class="mb-1">Payment pending. Pay now.</p>
                                <p class="small m-0 text-secondary">3 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mx-3 my-1">
                        <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                </div>
            </div>
            <div class="dropdown border-start">
                <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell fs-4 lh-1 text-secondary"></i>
                    <span class="count-label info"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg">
                    <h5 class="fw-semibold px-3 py-2 text-primary">Updates</h5>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <div class="icon-box md bg-success rounded-circle me-3">
                                <span class="fw-bold text-white">DS</span>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Douglass Shaw</h6>
                                <p class="mb-1">
                                    Membership has been ended.
                                </p>
                                <p class="small m-0 text-secondary">Today, 07:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <div class="icon-box md bg-danger rounded-circle me-3">
                                <span class="fw-bold text-white">WG</span>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Willie Garrison</h6>
                                <p class="mb-1">
                                    Congratulate, James for new job.
                                </p>
                                <p class="small m-0 text-secondary">Today, 08:00pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2">
                            <div class="icon-box md bg-warning rounded-circle me-3">
                                <span class="fw-bold text-white">TJ</span>
                            </div>
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Terry Jenkins</h6>
                                <p class="mb-1">
                                    Lewis added new schedule release.
                                </p>
                                <p class="small m-0 text-secondary">Today, 09:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mx-3 my-1">
                        <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                </div>
            </div>
            <div class="dropdown border-start">
                <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-envelope-open fs-4 lh-1 text-secondary"></i>
                    <span class="count-label"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg">
                    <h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <img src="{{ asset('assets/images/user3.png') }}" class="img-3x me-3 rounded-5"
                                alt="Admin Theme" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Angelia Payne</h6>
                                <p class="mb-1">
                                    Membership has been ended.
                                </p>
                                <p class="small m-0 text-secondary">Today, 07:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <img src="{{ asset('assets/images/user1.png') }}" class="img-3x me-3 rounded-5"
                                alt="Admin Theme" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
                                <p class="mb-1">
                                    Congratulate, James for new job.
                                </p>
                                <p class="small m-0 text-secondary">Today, 08:00pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2">
                            <img src="{{ asset('assets/images/user4.png') }}" class="img-3x me-3 rounded-5"
                                alt="Admin Theme" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                <p class="mb-1">
                                    Lewis added new schedule release.
                                </p>
                                <p class="small m-0 text-secondary">Today, 09:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mx-3 my-1">
                        <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/images/user.png') }}" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
                <span class="ms-2 text-truncate d-lg-block d-none">Anne Santiago</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <div class="header-action-links mx-3 gap-2">
                    <a class="dropdown-item" href="profile.html"><i class="bi bi-person text-primary"></i>Profile</a>
                    <a class="dropdown-item" href="settings.html"><i class="bi bi-gear text-danger"></i>Settings</a>
                    <a class="dropdown-item" href="widgets.html"><i class="bi bi-box text-success"></i>Widgets</a>
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
<!-- App header ends --> --}}

<!-- App header starts -->
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
        <a href="index.html" class="d-sm-block d-none">
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
                <img src="{{ asset('assets/images/user.png') }}" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
                <div class="ms-2 text-truncate d-lg-block d-none">
                    <span>{{ Auth::user()->name }}</span><br>
                    <span><strong>{{ Auth::user()->roles->pluck('name')->join(', ') }}</strong></span>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <div class="header-action-links mx-3 gap-2">
                    <a class="dropdown-item" href="profile.html"><i class="bi bi-person text-primary"></i>Profile</a>
                    <a class="dropdown-item" href="settings.html"><i class="bi bi-gear text-danger"></i>Settings</a>
                    <a class="dropdown-item" href="widgets.html"><i class="bi bi-box text-success"></i>Widgets</a>
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
