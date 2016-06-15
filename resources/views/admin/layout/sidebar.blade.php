<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
            </div>
        </div>

        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="/admin"><i class="fa fa-dashboard"></i><span>DashBoard</span></a></li>
            <li><a href="/admin/user"><i class="fa fa-user"></i><span>Users</span></a></li>
            <li><a href="/admin/category"><i class="fa fa-list"></i><span>Category</span></a></li>
            <li><a href="/admin/merchant"><i class="fa fa-scissors"></i><span>Stylo</span></a></li>
            <li><a href="/admin/product"><i class="fa fa-photo"></i><span>Product</span></a></li>
            <li><a href="/admin/booking"><i class="fa fa-calendar"></i><span>Booking</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
