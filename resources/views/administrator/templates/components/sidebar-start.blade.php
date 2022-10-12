<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            &nbsp;
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
             data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main" data-active-menu="{{ $activeMenu ?? '' }}">
                    {{ $slot }}
                </ul>
            </nav>

            <hr class="separator"/>

            <div class="sidebar-widget widget-tasks">
                <div class="widget-header">
                    <h6>Projects</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-0">
                        <li><a href="#">Porto HTML5 Template</a></li>
                        <li><a href="#">Tucson Template</a></li>
                        <li><a href="#">Porto Admin</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</aside>
<!-- end: sidebar -->