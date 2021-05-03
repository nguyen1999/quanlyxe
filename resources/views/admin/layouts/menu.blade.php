<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Bảng điều khiển</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-check-circle" aria-hidden="true"></i> Hãng xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('brand.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('brand.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Phụ kiện xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('accessary.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('accessary.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-compress" aria-hidden="true"></i> Trang thiết bị xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('combine.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('combine.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-car" aria-hidden="true"></i> Xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('car.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('car.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Lịch thuê xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('calendar.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-film" aria-hidden="true"></i> Banner<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('banner.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('banner.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>