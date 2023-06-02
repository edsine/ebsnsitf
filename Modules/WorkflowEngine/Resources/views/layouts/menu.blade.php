
<li class="nav-item">
    <a href="{{ route('fieldTypes.index') }}" class="nav-link {{ Request::is('fieldTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Field Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('actorTypes.index') }}" class="nav-link {{ Request::is('actorTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Actor Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('stepActivities.index') }}" class="nav-link {{ Request::is('stepActivities*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Step Activities</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('stepTypes.index') }}" class="nav-link {{ Request::is('stepTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Step Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('workflowTypes.index') }}" class="nav-link {{ Request::is('workflowTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflow Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('actorRoles.index') }}" class="nav-link {{ Request::is('actorRoles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Actor Roles</p>
    </a>
</li>
