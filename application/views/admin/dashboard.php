<?php foreach ($pelayan_category as $c) : ?>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet" id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-wrapper">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text my-3">
                                        Grafik Jadwal Ibadah <?= $c->category;?> Dalam 1 Bulan
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body text-center">
                        <div id="chart<?= str_replace(' ', '_', $c->category) ?>" style="width: 100%;height:800px"></div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
<?php endforeach; ?>