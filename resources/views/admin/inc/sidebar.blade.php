<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            
            <li>
                <a href="/dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i>{{ __('messages.adminpanel') }}</a>
            </li>
            <li>
                <a ><i class="fa fa-bookmark fa-fw"></i> {{ __('messages.reservations') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/reservations">{{ __('messages.reservations') }}</a>
                    </li>
                    <li>
                        <a href="/admin/requests">{{ __('messages.requests') }}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="/admin/rooms"><i class="fa fa-home fa-fw"></i> {{ __('messages.chalets') }}</a>
            </li>
            <li>
                <a href="/admin/blogs"><i class="fa fa-book fa-fw"></i> Blogs</a>
            </li>
            <li>
                <a href="/admin/dishes"><i class="fa fa-cutlery fa-fw"></i> Menu</a>
                
            </li>
            <li>
                <a href="/admin/users"><i class="fa fa-user-circle fa-fw"></i> {{ __('messages.users') }}</a>
               
            </li>
            
        </ul>
    </div>
</div>