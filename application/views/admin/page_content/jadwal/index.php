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
                <div class="m-portlet__head-tools">
                    <a href="<?= base_url("admin-page/jadwal-rules"); ?>" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mr-2">
                        <span>
                            <i class="la la-list"></i>
                            <span>Rules Jadwal</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div id="output"></div>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="table_sortable">
                <thead>
                    <tr>
                        <th class="no-sort" style="width: 15px;">
                            <input type="checkbox" name="select-all" id="select-all" />
                        </th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Pelayanan</th>
                    </tr>
                </thead>
                <tbody class="sortable">
                    <!-- <?php if ($pages) { ?>
                        <?php foreach ($pages as $p) : ?>
                            <tr id="<?= $p->id ?>">
                                <td>
                                    <input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]" value="<?= $p->id ?>">
                                </td>
                                <td width="40%">
                                    <a href="<?= base_url("admin-page/edit-" . str_replace("_", "-", $tablename) . "/" . $p->id) ?>">
                                        <?= $p->nama; ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $p->status;?>
                                </td>
                                <td>
                                    <?= $p->jenis_kelamin;?>
                                </td>
                                <td>
                                    <?= $p->category;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else {
                        echo '<tr><td colspan="8" class="text-center">No Data</td></tr>';
                    } ?> -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>