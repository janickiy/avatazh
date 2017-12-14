<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center">
                <a href="{{ url('/') }}"><img src="{{ asset(getSetting('SITE_LOGO')) }}" class="" alt="Logo"></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Главное меню</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active': '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Панель управления</span>
                </a>
            </li>
            <li class="{{ Request::is('/') ? 'active': '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-desktop"></i> <span>Перейти на сайт</span>
                </a>
            </li>

            <li class="treeview {{ Request::is('admin/user*') ? 'active': '' || Request::is('admin/role*') ? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Пользователи</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/users')? 'active': '' }}">
                        <a href="{{ url('admin/users') }}">
                            <i class="fa fa-list"></i> <span>Администрирование</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/users/create')? 'active': '' }}">
                        <a href="{{ url('admin/users/create') }}">
                            <i class="fa fa-plus"></i> <span>Добавить</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/role*')? 'active': '' }}">
                        <a href="#"><i class="fa fa-key"></i> Настройки ролей <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::is('admin/roles')? 'active': '' }}"><a
                                        href="{{ url('admin/roles') }}"><i class="fa fa-list"></i> Управление ролями</a></li>
                            <li class="{{ Request::is('admin/roles/create')? 'active': '' }}"><a
                                        href="{{ url('admin/roles/create') }}"><i class="fa fa-plus"></i> Добавить роль</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/carmark*') ? 'active': '' || Request::is('admin/carmodel*') ? 'active': '' || Request::is('admin/carmodification*') ? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Марки и модели</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/carmarks') ? 'active': '' }}">
                        <a href="{{ url('admin/carmarks') }}">
                            <i class="fa fa-list"></i> <span>Марка</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/carmarks/create') ? 'active': '' }}">
                        <a href="{{ url('admin/carmarks/create') }}">
                            <i class="fa fa-plus"></i> <span>Добавить марку</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/carmarks/import') ? 'active': '' }}">
                        <a href="{{ url('admin/carmarks/import') }}">
                            <i class="fa fa-download"></i> <span>Импорт</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/catalogusedcar*')? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-automobile"></i> <span>Автомобили с пробегом</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/catalogusedcars')? 'active': '' }}">
                        <a href="{{ url('admin/catalogusedcars') }}">
                            <i class="fa fa-list"></i> <span>Администрирование</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/catalogusedcars/create')? 'active': '' }}">
                        <a href="{{ url('admin/catalogusedcars/create') }}">
                            <i class="fa fa-plus"></i> <span>Добавить автомобиль</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/page*')? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Контент</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/pages')? 'active': '' }}">
                        <a href="{{ url('admin/pages') }}">
                            <i class="fa fa-list"></i> <span>Администрирование</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/pages/create')? 'active': '' }}">
                        <a href="{{ url('admin/pages/create') }}">
                            <i class="fa fa-plus"></i> <span>Добавить контент</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/review*')? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>Отзывы</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/reviews')? 'active': '' }}">
                        <a href="{{ url('admin/reviews') }}">
                            <i class="fa fa-list"></i> <span>Администрирование</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::is('admin/menu*')? 'active': '' }}">
                <a href="#"><i class="fa fa-list-alt"></i> Настройки меню <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/menus')? 'active': '' }}"><a href="{{ url('admin/menus') }}"><i class="fa fa-list"></i> Управление меню</a></li>
                    <li class="{{ Request::is('admin/menus/create')? 'active': '' }}"><a href="{{ url('admin/menus/create') }}"><i class="fa fa-plus"></i> Добавить меню</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::is('admin/setting*')? 'active': '' }}">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Настройки</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/settings')? 'active': '' }}">
                        <a href="{{ url('admin/settings') }}">
                            <i class="fa fa-list"></i> <span>Администрирование</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/settings/create')? 'active': '' }}">
                        <a href="{{ url('admin/settings/create') }}">
                            <i class="fa fa-plus"></i> <span>Добавить настройки</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->