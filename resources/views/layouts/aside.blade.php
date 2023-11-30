<!-- aside -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light text-center">{{ __('Solicoders') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="{{route('project.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ __('Projets') }}
                        </p>
                    </a>
                </li> --}}
                @isset($projects)
                    @if ($projects->isNotEmpty())
                        <li class="nav-item">
                            @if (isset($projects[0]))
                                <a href="{{ route('task.index', ['project' => $projects[0]]) }}" class="nav-link">
                            @endif
                            <i class="nav-icon fa-solid fa-bars-progress"></i>
                            <p> {{ __('Taches') }} </p>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="javascript:void(0);" onclick="history.back();"  class="nav-link">
                            <i class="nav-icon fa-solid fa-bars-progress"></i>
                            <p> {{ __('Taches') }} </p>
                        </a>
                    </li>
                @endisset
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
