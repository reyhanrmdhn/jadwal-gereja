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
        <li class="m-menu__item m-menu__item--<?= $this->uri->segment(2) == 'media' ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/media') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-images"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Media</span>

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

       <!-- PORTFOLIO -->
       <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'inbox') !== false ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/inbox') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-address-book"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Inbox</span>

                    </span>
                </span>
            </a>
        </li>

        <li class="m-menu__item  m-menu__item--submenu
        <?= $this->uri->segment(2) == 'admin-email' ?
            'm-menu__item--open m-menu__item--expanded m-menu__item--active' : '' ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fas fa-cogs"></i>
                <span class="m-menu__link-text">System Settings</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'admin-email') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/admin-email') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Admin Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <!-- page seo -->
        <li class="m-menu__section" style="margin-top:10px">
            <h4 class="m-menu__section-text">Page SEO</h4>
        </li>
        <li class="m-menu__item m-menu__item--<?= $this->uri->segment(2) == 'page' || strpos($this->uri->segment(2), 'edit-page-') !== false || strpos($this->uri->segment(2), 'add-page-') !== false ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/page') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-file-alt"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Pages</span>
                    </span>
                </span>
            </a>
        </li>

        <!-- page setting -->
        <li class="m-menu__section" style="margin-top:10px">
            <h4 class="m-menu__section-text">Page Setting</h4>
        </li>

        <li class="m-menu__item  m-menu__item--submenu
        <?= strpos($this->uri->segment(2), 'page-setting') !== false ||
            strpos($this->uri->segment(2), 'page-status') !== false ||
            strpos($this->uri->segment(2), 'social-media') !== false ? 'm-menu__item--open m-menu__item--expanded m-menu__item--active' : '' ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fas fa-sliders"></i>
                <span class="m-menu__link-text">Page Setting</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'page-setting') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/page-setting') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Page Setting</span>
                        </a>
                    </li>
                </ul>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'page-status') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/page-status') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Page Status</span>
                        </a>
                    </li>
                </ul>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'social-media') !== false ? 'active' : '' ?>" aria-haspopup="true">
                        <a href="<?php echo site_url('admin-page/social-media') ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Social Media</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- page content -->
        <li class="m-menu__section" style="margin-top:10px">
            <h4 class="m-menu__section-text">Page Content</h4>
        </li>

        <!-- HOME  -->
        <li class="m-menu__item  m-menu__item--submenu
        <?= strpos($this->uri->segment(2), 'home-banner') !== false ?
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

        <!-- PORTFOLIO -->
        <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'portfolio') !== false ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/portfolio') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-folder-tree"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Portfolio</span>

                    </span>
                </span>
            </a>
        </li>


         <!-- PUBLICATION -->
         <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'publication') !== false ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/publication') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-newspaper"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Publication</span>

                    </span>
                </span>
            </a>
        </li>


        <!-- BIO -->
        <li class="m-menu__item m-menu__item--<?= strpos($this->uri->segment(2), 'bio') !== false ? 'active' : '' ?>" aria-haspopup="true">
            <a href="<?php echo site_url('admin-page/bio') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fas fa-address-card"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Bio</span>

                    </span>
                </span>
            </a>
        </li>

    </ul>
</div>