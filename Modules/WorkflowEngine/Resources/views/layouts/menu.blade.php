
<li class="nav-item">
    <a href="{{ route('fieldTypes.index') }}" class="nav-link {{ Request::is('fieldTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/fieldTypes.plural')</p>
    </a>
</li>
