<div class="subpage-head has-margin-bottom">
    <div class="container">
        <h3>Programs &amp; Events </h3>
        <p class="lead">List of Upcoming Events and Programs</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 has-margin-bottom">
            <?php foreach ($jadwal as $j) : ?>
                <?php $schedule = $this->db->get_where('jadwal_rules', ['nama_kegiatan' => $j->nama_kegiatan])->row() ?>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="highlight-bg has-padding-xs event-details">
                            <div class="ed-title">EVENT DETAILS</div>
                            <div class="ed-content"> <span class="glyphicon glyphicon-calendar"></span> <?= getHari($j->hari) . ' ' . date('d F Y', strtotime($j->tanggal)); ?><br>
                                <span class="glyphicon glyphicon-time"></span> <?= date('H:i', strtotime($schedule->jam_mulai)) . ' - ' . date('H:i', strtotime($schedule->jam_selesai)); ?> <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 bulletin">
                        <h4 class="media-heading"><?= $j->nama_kegiatan ?></h4>
                        <p class="media-content"><?= $schedule->deskripsi; ?></p>
                        <a class="btn btn-primary" href="javascript:void(0)" role="button" data-toggle="modal" data-target="#jadwalModal_<?= $j->id ?>">Event Details →</a>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>


        <div class="col-md-3">
            <div class="well">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($jadwal as $j) : ?>
    <?php $schedule = $this->db->get_where('jadwal_rules', ['nama_kegiatan' => $j->nama_kegiatan])->row() ?>
    <div class="modal fade" id="jadwalModal_<?= $j->id ?>" tabindex="-1" role="dialog" aria-labelledby="jadwalModal_<?= $j->id ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Ibadah/Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-22px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="media-heading"><?= $j->nama_kegiatan ?></h4>
                    <p class="media-content"><?= $schedule->deskripsi; ?></p>
                    <table class="table table-hover" style="margin-top:20px">
                        <thead>
                            <tr>
                                <th scope="col">Pelayan</th>
                                <th scope="col">Nama Pelayan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Decode the JSON data into a PHP array
                            $decoded_data = json_decode($j->pelayan, true);

                            // Iterate through the decoded data and prepare for display
                            $formatted_data = [];
                            foreach ($decoded_data as $key => $value) { ?>
                                <tr>
                                    <th><?= ucfirst($key) ?> </th>
                                    <td><?= implode('<br>', $value) ?> </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>