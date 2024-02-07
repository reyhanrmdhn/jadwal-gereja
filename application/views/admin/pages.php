<div class="m-content">
    <?= $this->session->flashdata('success'); ?>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Manage SEO for All Pages
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable datatable">
                <thead>
                    <tr>
                        <th class="" style="width: 50px;">No.</th>
                        <th style="width: 80%">Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Home</td>
                        <td><a href="<?php echo site_url('admin-page/edit-page-home') ?>"><button type="button" class="btn m-btn--pill btn-info">Edit <i class="fa fa-edit fa-fw" style="position: relative;top: -2px;"> </i></button></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Contact</td>
                        <td><a href="<?php echo site_url('admin-page/edit-page-contact') ?>"><button type="button" class="btn m-btn--pill btn-info">Edit <i class="fa fa-edit fa-fw" style="position: relative;top: -2px;"> </i></button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>