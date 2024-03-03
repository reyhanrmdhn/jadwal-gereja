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
                        <th>No.</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Pelayan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($pages) { ?>
                        <?php $x = 1; ?>
                        <?php foreach ($pages as $p) : ?>
                            <tr>
                                <td>
                                    <?= $x; ?>
                                </td>
                                <td>
                                    <?= $p->nama_kegiatan; ?>
                                </td>
                                <td>
                                    <?= getHari($p->hari) . ', ' . $p->tanggal; ?>
                                </td>
                                <td>
                                    <?php
                                    // Decode the JSON data into a PHP array
                                    $decoded_data = json_decode($p->pelayan, true);

                                    // Iterate through the decoded data and prepare for display
                                    $formatted_data = [];
                                    foreach ($decoded_data as $key => $value) {
                                        $formatted_data[] = '<b>' . ucfirst($key) . '</b>' . ' : ' . implode(', ', $value);
                                    }

                                    // Display the formatted data
                                    $pelayan = implode('<br>', $formatted_data);
                                    echo $pelayan;
                                    ?>
                                </td>
                            </tr>
                            <?php $x++; ?>
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