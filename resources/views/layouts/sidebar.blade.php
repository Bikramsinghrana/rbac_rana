@php
    $user = Auth::user();
@endphp

<div class="bg-dark text-white vh-100 p-3" style="width:240px;">
    <h5 class="mb-4">
        @if($user->hasRole('admin'))
            Admin Panel
        @elseif($user->hasRole('project-manager'))
            Project Manager Panel
        @else
            User Dashboard
        @endif
    </h5>

    <ul class="nav nav-pills flex-column gap-1">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'text-white' }}">
                Dashboard
            </a>
        </li>

        {{-- Admin Only --}}
        @role('admin')
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}"
                   class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : 'text-white' }}">
                    Users
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.roles.index') }}"
                   class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : 'text-white' }}">
                    Roles & Permissions
                </a>
            </li>
        @endrole

        {{-- Project Manager --}}
        @role('project-manager|user')
            @can('project.view')
                <li class="nav-item">
                    <a href="{{ route('projects.dashboard') }}"
                    class="nav-link {{ request()->routeIs('projects.*') ? 'active' : 'text-white' }}">
                        Projects
                    </a>
                </li>
            @endcan
        @endrole


        {{-- Logout --}}
        <li class="nav-item mt-3">
            <a href="#"
               class="nav-link text-danger"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>
</div>
