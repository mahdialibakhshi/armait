<div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
     aria-orientation="vertical">
    <a class="nav-link"
       target="_blank"
       href="{{ route('home') }}">
        <i class="icon ion-md-log-out"></i>
        HOME
    </a>
    <a class="nav-link {{ request()->is('admin-panel/management/dashboard') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
        <i class="icon ion-md-person"></i>
        Dashboard
    </a>
    <div class="dropdown">
        <a class="nav-link {{ request()->is('admin-panel/management/setting*') ? 'active' : '' }}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon ion-md-settings"></i>
            Settings
        </a>
        <div class="dropdown-menu {{ request()->is('admin-panel/management/setting*') ? 'show' : '' }}" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item {{ request()->is('admin-panel/management/setting/index') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.setting.index') }}">Config</a>
            <a class="dropdown-item {{ request()->is('admin-panel/management/setting/header1*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.header1.index') }}">Header 1</a>
            <a class="dropdown-item {{ request()->is('admin-panel/management/setting/header2*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.header2.index') }}">Header 2</a>
        </div>
    </div>
    <a class="nav-link {{ request()->is('admin-panel/management/form') ? 'active' : '' }}"
       href="{{ route('admin.form.index') }}">
        <i class="icon ion-ios-clipboard"></i>
        Form
    </a>
</div>

