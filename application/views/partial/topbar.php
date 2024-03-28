<body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.html"> <img src="<?= base_url('assets/') ?>img/logo/logo.png" alt="church logo" class="img-responsive"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? "active" : "" ?>"><a href="<?= base_url() ?>">Beranda</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'event-programs') ? "active" : "" ?>"><a href="<?= base_url('event-programs') ?>">Jadwal Ibadah</a></li>
                    <li class="<?= ($this->uri->segment(1) == 'event-calendar') ? "active" : "" ?>"><a href="<?= base_url('event-calendar') ?>">Kalender Jadwal Ibadah</a></li>
                </ul>
            </div>

        </div>
    </div>