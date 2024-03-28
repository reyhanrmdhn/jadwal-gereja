<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__section" style="margin:0">
            <h4 class="m-menu__section-text">Admin</h4>
        </li>
        <li class="m-menu__item  m-menu__item--<?= $this->uri->segment(2) == 'index' || $this->uri->segment(2) == '' ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/index') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-chart-line"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Dashboard</span>

                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--<?= $this->uri->segment(2) == 'user-management' || $this->uri->segment(2) == 'add-admin-account' ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/user-management') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon  fa fa-users"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Users</span>
                    </span>
                </span>
            </a>
        </li>

        <!-- page content -->
        <li class="m-menu__section" style="margin-top:10px">
            <h4 class="m-menu__section-text">Page Content</h4>
        </li>

        <!-- HOME  -->
        <li class="m-menu__item  m-menu__item--submenu
        <?= strpos($this->uri->segment(2), 'home') !== false ?
            'm-menu__item--open m-menu__item--expanded m-menu__item--active' : '' ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-home"></i>
                <span class="m-menu__link-text">Home</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'home-banner') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/home-banner') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Banner</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


         <!-- PENJADWALAN -->
         <li class="m-menu__item  m-menu__item--submenu
        <?= strpos($this->uri->segment(2), 'pelayan') !== false || strpos($this->uri->segment(2), 'jadwal') !== false ?
            'm-menu__item--open m-menu__item--expanded m-menu__item--active' : '' ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-calendar-days"></i>
                <span class="m-menu__link-text">Penjadwalan Gereja</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'pelayan-list') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/pelayan-list') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">List Pelayan</span>
                        </a>
                    </li>
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'jadwal') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/jadwal') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Jadwal Ibadah</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>