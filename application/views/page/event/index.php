<div class="subpage-head has-margin-bottom">
    <div class="container">
        <h3>Programs &amp; Events </h3>
        <p class="lead">List of Upcoming Events and Programs</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 has-margin-bottom">
            <?php for ($i = 0; $i < count($jadwal); $i++) : ?>
                <?php $kegiatan = $this->db->get_where('jadwal_rules', ['hari' => $jadwal[$i]['dayOfWeek']])->row() ?>
                <?php if ($kegiatan->hari == 'Sunday') { ?>
                    <?php $kegiatanPlus = $this->db->get_where('jadwal_rules', ['hari' => $jadwal[$i]['dayOfWeek']])->result() ?>
                    <?php for ($x = 0; $x < count($kegiatanPlus); $x++) : ?>
                        <?php var_dump($x); ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="highlight-bg has-padding-xs event-details">
                                    <div class="ed-title">EVENT DETAILS</div>
                                    <div class="ed-content"> <span class="glyphicon glyphicon-calendar"></span> <?= $jadwal[$i]['dayOfWeek'] . ' ' . $jadwal[$i]['dayOfMonth'] . ' ' . date('F') . ' ' . date('Y'); ?><br>
                                        <span class="glyphicon glyphicon-time"></span> 10.00 AM to 02.00 PM <br>
                                        <span class="glyphicon glyphicon-map-marker"></span> Melbourne
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 bulletin">
                                <h4 class="media-heading"><?= $kegiatanPlus[$x]->nama_kegiatan ?></h4>
                                <p class="media-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem.</p>
                                <a class="btn btn-primary" href="<?= base_url('event-programs/detail') ?>" role="button">Event Details →</a>
                            </div>
                        </div>
                        <hr>
                    <?php endfor; ?>
                    <?php $i++; ?>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="highlight-bg has-padding-xs event-details">
                                <div class="ed-title">EVENT DETAILS</div>
                                <div class="ed-content"> <span class="glyphicon glyphicon-calendar"></span> <?= $jadwal[$i]['dayOfWeek'] . ' ' . $jadwal[$i]['dayOfMonth'] . ' ' . date('F') . ' ' . date('Y'); ?><br>
                                    <span class="glyphicon glyphicon-time"></span> 10.00 AM to 02.00 PM <br>
                                    <span class="glyphicon glyphicon-map-marker"></span> Melbourne
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 bulletin">
                            <h4 class="media-heading"><?= $kegiatan->nama_kegiatan ?></h4>
                            <p class="media-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem.</p>
                            <a class="btn btn-primary" href="<?= base_url('event-programs/detail') ?>" role="button">Event Details →</a>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            <?php endfor; ?>
        </div>


        <div class="col-md-3">
            <div class="vertical-links has-margin-xs-bottom">
                <h4>Event Categories</h4>
                <ol class="list-unstyled">
                    <li><a href="#">Children <span class="badge pull-right">23</span> </a></li>
                    <li><a href="#">Bible <span class="badge pull-right">19</span> </a></li>
                    <li><a href="#">Crucification <span class="badge pull-right">04</span> </a></li>
                    <li><a href="#">Special Occations <span class="badge pull-right">12</span> </a></li>
                    <li><a href="#">Meetings <span class="badge pull-right">42</span> </a></li>
                    <li><a href="#">Charity <span class="badge pull-right">20</span> </a></li>
                </ol>
            </div>
            <div class="well">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
        </div>
    </div>
</div>