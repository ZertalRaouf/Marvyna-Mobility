<aside class="main-sidebar bg-info">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize">Raouf ZERTAL</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Tableau de bord
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link {{request()->is('admin/users*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Utilisateurs
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.drivers.index')}}" class="nav-link {{request()->is('admin/drivers*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Chauffeurs
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.students.index')}}" class="nav-link {{request()->is('admin/students*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            ??l??ves
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.vehicules.index')}}" class="nav-link {{request()->is('admin/vehicules*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            V??hicules
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.circuits.index')}}" class="nav-link {{request()->is('admin/circuits*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            Circuits
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.collaborators.index')}}" class="nav-link {{request()->is('admin/collaborators*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Collaborateurs
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.establishments.index')}}" class="nav-link {{request()->is('admin/establishments*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            ??tablissements
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.actualities.index')}}" class="nav-link {{request()->is('admin/actualities*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Actualit??s
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Abonnements
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.slots.index')}}" class="nav-link {{request()->is('admin/slots*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Plannings
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin.roadmaps.index')}}" class="nav-link {{request()->is('admin/roadmaps*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Feuille De Route
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
