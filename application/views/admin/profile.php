<!-- BEGIN: Subheader -->

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">My Profile</h3>
        </div>

    </div>
</div>



<!-- END: Subheader -->
<!-- CONTENT DASHBOARD -->
<div class="m-content">
    <?php if ($this->session->flashdata('success')) echo $this->session->flashdata('success'); ?>
    <?php if (validation_errors()) : ?>
        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> <span><?php echo validation_errors('<li>', '</li>') ?></span> </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Your Profile
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <?php if ($this->session->userdata('image') == '') : ?>
                                    <img src="<?php echo base_url() ?>assets/admin/app/media/img/users/user4.jpg" alt="" />
                                <?php elseif ($this->session->userdata('image')) : ?>
                                    <img src="<?php echo $this->session->userdata('image') ?>" alt="" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name"><?php echo $this->session->userdata('nama'); ?></span>
                            <a href="" class="m-card-profile__email m-link"><?php echo $this->session->userdata('email'); ?></a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="<?php echo site_url('admin-page/profile') ?>" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">My Profile</span>
                                    </span>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <div class="m-portlet__body-separator"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Update Profile
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <!-- TAB 1 -->
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <?php echo form_open('', 'class="m-form m-form--fit m-form--label-align-right"'); ?>
                        <div class="m-portlet__body" style="padding:20px 20px">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-12 ml-auto">
                                    <h3 class="m-form__section">1. Personal Details</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                <div class="col-7">
                                    <input type="text" class="form-control m-input" id="name" placeholder="Enter Name" name="name" value="<?php echo $admin->name ?>">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-7">
                                    <input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $admin->email ?>">
                                </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-12 ml-auto">
                                    <h3 class="m-form__section">2. Profile Picture</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Profile Picture</label>
                                <div class="col-7">
                                    <img src="<?php echo $admin->image ?>" style="max-width: 100%;" id="imageBanner"><br>
                                    <input type="text" class="form-control m-input" id="imageinput" placeholder="Upload File" value="<?php echo $admin->image ?>" name='image'>

                                    <a href="<?php echo base_url() ?>assets/admin/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                                </div>
                            </div>


                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-12 ml-auto">
                                    <h3 class="m-form__section">3. Password</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                                <div class="col-7">
                                    <input type="password" class="form-control m-input" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Password Confirmation</label>
                                <div class="col-7">
                                    <input type="password" class="form-control m-input" id="exampleInputPassword2" placeholder="Password" name="passwordconfirmation">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                        <a href="<?php echo site_url('admin-page/profile') ?>" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- END TAB 1 -->
                </div>
            </div>
        </div>
    </div>
</div>