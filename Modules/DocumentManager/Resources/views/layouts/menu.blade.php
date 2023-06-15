<li class="nav-item">
    <a href="{{ route('folders.index') }}" class="nav-link {{ Request::is('folders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Folders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('documents.index') }}" class="nav-link {{ Request::is('documents*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Documents</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('documentVersions.index') }}" class="nav-link {{ Request::is('documentVersions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Document Versions</p>
    </a>
</li>
