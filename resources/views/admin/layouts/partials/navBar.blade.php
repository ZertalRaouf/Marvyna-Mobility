<nav class="main-header navbar navbar-expand navbar-white navbar-light border-transparent shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-info"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <img src="{{asset('assets/front/images/logo2.svg')}}" alt="logo" height="25px">
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-link"><a href="{{route('driver.dashboard')}}"><i class="fas fa-home text-info"></i></a></li>
        <li class="nav-link"><a href="{{route('driver.settings')}}" onclick="document.getElementById('logout-from').submit()"><i class="fas fa-sign-out-alt text-info"></i></a></li>
        <form action="{{route('admin.logout')}}" method="POST" id="logout-from">@csrf</form>

    </ul>
</nav>
