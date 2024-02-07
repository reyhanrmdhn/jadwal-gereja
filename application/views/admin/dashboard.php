<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Dashboard</h3>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <!-- START Content Widget -->
    <div class="row">
        <!-- inbox -->
        <div class="col-lg-3 col-md-6 h-100">
            <div class="m-portlet m-portlet--mobile ">
                <div class="card-body">
                    <div class="row" style="width: 100%; margin: 0;">
                        <div style="width: 25%">
                            <i class="fas fa-address-book" style="font-size: 50px;"></i>
                        </div>
                        <div style="width: 75%; text-align: right; font-size: 15px; font-weight: 500">
                            <div class="huge" style="font-size: 25px;"><?= $inbox;?></div>
                            <div>Total Inbox<br></div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin-page/inbox') ?>">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>