{{-- <!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Manajemen </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">Pos</a></li>
                        <li><a href="ui-loading-buttons.html">Kategori</a></li>
                        <li><a href="ui-panels.html">Tag</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Komentar </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Pengguna </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">User</a></li>
                        <li><a href="ui-loading-buttons.html">Role</a></li>
                        <li><a href="ui-panels.html">Permission</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End --> --}}

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            {!! Menu::render('navbar')  !!}
        </div>
        <div class="clearfix"></div>
    </div>
</div>