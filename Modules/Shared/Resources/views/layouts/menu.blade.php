<li class="nav-item">
    <a href="{{ route('branches.index') }}" class="nav-link {{ Request::is('branches*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Branches</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Departments</p>
    </a>
</li>
