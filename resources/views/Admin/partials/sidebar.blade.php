<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Gestion des utilisateurs</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ion ion-person"></i>
                            <p>
                                Utilisateurs
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Liste') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Nouvelle utilisateur') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>

                <li class="nav-header">Formations</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Formations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.formations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Liste Formation') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.formations.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Nouvelle formation') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>

                <li class="nav-header">Modules</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Modules
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.modules.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Liste Module') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.modules.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Nouveau Module') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>

                <li class="nav-header">Chapitres</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                chapitres
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.chapitres.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Liste Chapitre') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.chapitres.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Nouveau Chapitre') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>

                <li class="nav-header">Lecon</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Lecon
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.lecons.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Liste Leçon') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.lecons.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Nouvelle Leçon') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.mailbox.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mailbox.compose') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
