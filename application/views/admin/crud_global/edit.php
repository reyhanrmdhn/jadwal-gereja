<div class="m-content">
    <div class="row">
        <!-- Alert -->
        <div class="col-md-12">
            <?php if (validation_errors()) { ?>
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <span><?= validation_errors('<li>', '</li>') ?></span>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('success') ?>
        </div>
        <?= form_open_multipart('', 'style="width:100%"'); ?>
        <!-- PAGE TITLE -->
        <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <a href="<?= empty($back) ? 'javascript:void(0)' : base_url($back) ?>" style="text-decoration: none;" <?php if (!isset($back)) { ?> onclick="history.back()" <?php } ?>>
                                    <i class="la la-angle-left"></i>
                                </a>
                            </span>
                            <h3 class="m-portlet__head-text">
                                <?= ucfirst(str_replace("_", " ", $title)) ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BANNER TEXT  -->
        <?php if (isset($bannerrows)) { ?>
            <div class="col-md-12">
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Banner Settings
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <?php $data['imagetype'] = 1; ?>
                    <?php foreach ($bannerrows as $row) :  ?>
                        <div class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet__body">
                                <?php
                                $data['rows'] = $row;
                                $data['allrow'] = $bannerrows;
                                $this->load->view('admin/crud_global/components/form_body_edit', $data); ?>
                            </div>
                        </div>
                        <?php $data['imagetype'] = $data['imagetype'] + 1; ?>
                    <?php endforeach; ?>
                    <!--end::Form-->
                </div>
            </div>
        <?php } ?>

        <!-- FORM DEFAULT -->
        <?php if (isset($rows)) { ?>
            <div class="col-md-12">
                <div class="m-portlet m-portlet--tab">
                    <!-- header -->
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Content Settings
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <?php
                    if (isset($bannerrows)) {
                        $data['imagetype'] = $data['imagetype'];
                    } else {
                        $data['imagetype'] = 1;
                    } ?>
                    <?php foreach ($rows as $row) :  ?>
                        <div class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet__body">
                                <?php
                                $data['rows'] = $row;
                                $data['allrow'] = $rows;
                                $this->load->view('admin/crud_global/components/form_body_edit', $data); ?>
                            </div>
                        </div>
                        <?php $data['imagetype'] = $data['imagetype'] + 1; ?>
                    <?php endforeach; ?>
                    <!--end::Form-->
                    <?php if (!isset($seorows)) { ?>
                        <div class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <input type="submit" class="btn btn-primary">
                                    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- SEO  -->
        <?php if (isset($seorows)) { ?>
            <div class="col-md-12">
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    SEO
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <?php
                            $data['rows'] = $seorows;
                            $this->load->view('admin/crud_global/components/form_body_edit', $data); ?>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <input type="submit" class="btn btn-primary">
                                <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
            </div>
        <?php } ?>
        <?= form_close(); ?>
    </div>
</div>