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
                    <a href="<?= site_url("admin-page/add-" . str_replace("_", "-", $tablename)); ?>" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mr-2">
                        <span>
                            <i class="la la-plus"></i>
                            <span>New Item</span>
                        </span>
                    </a>
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
            <table class="table table-striped- table-bordered table-hover table-checkable datatable">
                <thead>
                    <tr>
                        <th class="no-sort" style="width: 15px;">
                            <input type="checkbox" name="select-all" id="select-all" />
                        </th>
                        <th>Category</th>
                        <th style="width:10%;">Sort Order</th>
                    </tr>
                </thead>
                <tbody class="sortable">
                    <?php if ($pages) { ?>
                        <?php foreach ($pages as $p) : ?>
                            <tr id="<?= $p->id ?>">
                                <td>
                                    <input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]" value="<?php echo $p->id ?>">
                                </td>
                                <td>
                                    <a href="<?php echo site_url("admin-page/edit-" . str_replace("_", "-", $tablename) . "/" . $p->id) ?>">
                                        <?= $p->category; ?>
                                    </a>
                                </td>
                                <td class="text-center"><i class="fa fa-arrows-alt-v" aria-hidden="true"></i></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else {
                        echo '<tr><td colspan="3" class="text-center">No Data</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>