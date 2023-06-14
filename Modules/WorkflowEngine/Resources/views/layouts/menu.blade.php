<li class="nav-item">
    <a href="{{ route('workflowTypes.index') }}" class="nav-link {{ Request::is('workflowTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflow Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('workflows.index') }}" class="nav-link {{ Request::is('workflows*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflows</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('fieldTypes.index') }}" class="nav-link {{ Request::is('fieldTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Field Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('forms.index') }}" class="nav-link {{ Request::is('forms*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Forms</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('formFields.index') }}" class="nav-link {{ Request::is('formFields*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Form Fields</p>
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
    <a href="{{ route('actorRoles.index') }}" class="nav-link {{ Request::is('actorRoles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Actor Roles</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('workflowInstances.index') }}"
        class="nav-link {{ Request::is('workflowInstances*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflow Instances</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('workflowSteps.index') }}" class="nav-link {{ Request::is('workflowSteps*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflow Steps</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('workflowActivities.index') }}" class="nav-link {{ Request::is('workflowActivities*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Workflow Activities</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Departments</p>
    </a>
</li>
