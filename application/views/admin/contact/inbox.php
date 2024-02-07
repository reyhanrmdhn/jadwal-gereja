<div class="m-content">

    <?= $this->session->flashdata('success'); ?>

    <?php if (validation_errors()) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <span><?php echo validation_errors('<li>', '</li>') ?></span>
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
                <div class="m-portlet__head-tools">
                    <button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="del_all">
                        <span>
                            <i class="la la-minus"></i>
                            <span>Delete item</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="output"></div>

            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable excelTable" id="table_inbox">
                <thead>
                    <tr>
                        <th class="no-sort" style="width: 15px;">
                            <input type="checkbox" name="select-all" id="select-all" />
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th width="10%">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($pages) { ?>
                        <?php foreach ($pages as $p) : ?>
                            <tr id="<?= $p->id ?>">
                                <td>
                                    <input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]" value="<?php echo $p->id ?>">
                                </td>
                                <td>
                                    <p><?= $p->name; ?></p>
                                </td>
                                <td>
                                    <?= $p->email; ?>
                                </td>
                                <td>
                                    <?= $p->subject; ?>
                                </td>
                                <td>
                                    <?= $p->message; ?>
                                </td>
                                <td>
                                    <?= date('d F Y', strtotime($p->submitted_at)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else {
                        echo '<tr><td colspan="7" class="text-center">No Data</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>