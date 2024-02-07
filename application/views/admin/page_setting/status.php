<div class="m-content">

    <?= $this->session->flashdata('success'); ?>

    <?php if (validation_errors()) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <span><?= validation_errors('<li>', '</li>') ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-wrapper">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text my-3">
                            <?= $title; ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="output"></div>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable datatable">
                <thead>
                    <tr>
                        <th style="width: 80%">Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Portfolio</td>
                        <td>
                            <span class="m-switch">
                                <label>
                                    <input type="checkbox" <?php if ($status->portfolio == "publish") {
                                                                echo 'checked';
                                                            } ?> name="" onclick="toggleFeature(this,'portfolio');">
                                    <span></span>
                                </label>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Publication</td>
                        <td>
                            <span class="m-switch">
                                <label>
                                    <input type="checkbox" <?php if ($status->publication == "publish") {
                                                                echo 'checked';
                                                            } ?> name="" onclick="toggleFeature(this,'publication');">
                                    <span></span>
                                </label>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>
                            <span class="m-switch">
                                <label>
                                    <input type="checkbox" <?php if ($status->contact == "publish") {
                                                                echo 'checked';
                                                            } ?> name="" onclick="toggleFeature(this,'contact');">
                                    <span></span>
                                </label>
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
