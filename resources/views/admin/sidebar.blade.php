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
        <a class="d-flex justify-content-between align-items-center nav-link {{ request()->is('admin-panel/management/users*') ? 'active' : '' }}" type="button" id="UsersMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>
                <i class="fa fa-users"></i>
            Users
            </span>
            @if($penddig_users>0)
            <span class="circle-notification">{{ $penddig_users }}</span>
            @endif
        </a>
        <div class="dropdown-menu {{ request()->is('admin-panel/management/users*') ? 'show' : '' }}" aria-labelledby="UsersMenuButton">
            <a class="dropdown-item {{ request()->is('admin-panel/management/users/registered*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.users.index',['type'=>'registered']) }}">registered</a>
            <a class="d-flex justify-content-between align-items-center dropdown-item {{ request()->is('admin-panel/management/users/pending*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.users.index',['type'=>'pending']) }}">
                <span>pending</span>
                @if($penddig_users>0)
                    <span class="circle-notification">{{ $penddig_users }}</span>
                @endif
            </a>
            <a class="dropdown-item {{ request()->is('admin-panel/management/users/denied*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.users.index',['type'=>'denied']) }}">denied</a>
        </div>
    </div>
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
    <div class="dropdown">
        <a class="nav-link {{ request()->is('admin-panel/management/messages*') ? 'active' : '' }}" type="button" id="MessagesMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon ion-md-settings"></i>
            Messages
        </a>
        <div class="dropdown-menu {{ request()->is('admin-panel/management/messages*') ? 'show' : '' }}" aria-labelledby="MessagesMenuButton">
            <a class="dropdown-item {{ request()->is('admin-panel/management/messages/email*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.emails.index') }}">email</a>
            <a class="dropdown-item {{ request()->is('admin-panel/management/messages/alert*') ? 'dropdown-item-active' : '' }}" href="{{ route('admin.alerts.index') }}">alert</a>
        </div>
    </div>
    <a class="nav-link {{ request()->is('admin-panel/management/form') ? 'active' : '' }}"
       href="{{ route('admin.form.index') }}">
        <i class="icon ion-ios-clipboard"></i>
        Form
    </a>
</div>

