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
                    <span class="m-portlet__head-icon mt-1">
                        <a href="<?= base_url('admin-page/jadwal') ?>" style="text-decoration: none;">
                            <i class="la la-angle-left"></i>
                        </a>
                    </span>
                    <div class="m-portlet__head-title ml-3">
                        <h3 class="m-portlet__head-text my-3">
                            <?= $title; ?>
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <a href="<?= base_url("admin-page/generateJadwal"); ?>" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mr-2">
                        <span>
                            <i class="fas fa-calendar-circle-plus"></i>
                            <span>Generate Jadwal</span>
                        </span>
                    </a>
                    <a href="<?= base_url("admin-page/add-" . str_replace("_", "-", $tablename)); ?>" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mr-2">
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
            <table class="table table-striped- table-bordered table-hover table-checkable" id="table_sortable">
                <thead>
                    <tr>
                        <th class="no-sort" style="width: 15px;">
                            <input type="checkbox" name="select-all" id="select-all" />
                        </th>
                        <th>Nama Kegiatan</th>
                        <th>Hari</th>
                        <th>Pelayan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($pages) { ?>
                        <?php foreach ($pages as $p) : ?>
                            <tr id="<?= $p->id ?>">
                                <td>
                                    <input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]" value="<?= $p->id ?>">
                                </td>
                                <td>
                                    <a href="<?= base_url("admin-page/edit-" . str_replace("_", "-", $tablename) . "/" . $p->id) ?>">
                                        <?= $p->nama_kegiatan; ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $p->hari; ?>
                                </td>
                                <td>
                                    <?php
                                    // Decode the JSON data into a PHP array
                                    $dataArray = json_decode($p->pelayan, true);

                                    // Loop through each element and format the string
                                    foreach ($dataArray as $item) {
                                        if ($item['jumlah'] > 0) {
                                            echo "Pelayan: " . $item['pelayan'] . " (" . $item['jumlah'] . ")<br>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else {
                        echo '<tr><td colspan="8" class="text-center">No Data</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>