<section class="shadow-sm bg-white">
    <nav class="navbar navbar-expand-lg container py-2">
        <a class="navbar-brand text-dark" href="{{route('driver.dashboard')}}">
            <img src="{{asset('assets/front/images/logo2.svg')}}" alt="logo" height="25px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-dark"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav text-center ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link text-orange" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-dark mr-3 text-capitalize">
                            {{$d->last_name.' '.$d->first_name}}
                        </span>
                        <img src="{{$d->image_url}}" alt="user" height="40" style="border-radius: 50%">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 py-0 shadow-sm mt-0 mt-lg-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item py-3" href="#"><i class="fas fa-user text-orange mr-4"></i>Mon profil</a>
                        <div class="dropdown-divider my-0"></div>
                        <a class="dropdown-item py-3" href="#"><i class="fas fa-cog text-orange mr-4"></i>Paramètres du compte</a>
                        <div class="dropdown-divider my-0"></div>
                        <a class="dropdown-item py-3" href="{{route('driver.logout')}}"><i class="fas fa-sign-out-alt text-orange mr-4"></i>Déconnexion</a>
                    </div>
                </li>

            </ul>

        </div>
    </nav>
</section>
