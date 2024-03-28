<div class="flexslider">
    <ul class="slides">
        <?php foreach ($home_banner as $banner) { ?>
            <li class="slide-one" style="background: url(<?= base_url($banner->image) ?>) no-repeat;background-size:cover">
                <div class="flexslider-caption" style="width: 80%;">
                    <h2><?= $banner->banner_title; ?></h2>
                    <p class="lead"><?= html_entity_decode($banner->banner_subtitle); ?></p>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>


<div class="highlight-bg">
    <div class="container event-list">
        <div class="section-title">
            <h4> Jadwal Ibadah Mendatang </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel">
                    <div class="el-block item">
                        <h4> JULY 16 </h4>
                        <p class="el-head">Weekly meeting &amp; prayer</p>
                        <span>Monday 07:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> JUL 29 </h4>
                        <p class="el-head">Show me your faith</p>
                        <span>Thursday 02:00 PM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> SEP 19 </h4>
                        <p class="el-head">Perseravance of the saints</p>
                        <span>Saturday 10:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> OCT 14 </h4>
                        <p class="el-head">God's irresistable grace</p>
                        <span>Sunday 11:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> JULY 16 </h4>
                        <p class="el-head">Weekly meeting &amp; prayer</p>
                        <span>Monday 07:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> JUL 29 </h4>
                        <p class="el-head">Show me your faith</p>
                        <span>Thursday 02:00 PM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> SEP 19 </h4>
                        <p class="el-head">Perseravance of the saints</p>
                        <span>Saturday 10:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                    <div class="el-block item">
                        <h4> OCT 14 </h4>
                        <p class="el-head">God's irresistable grace</p>
                        <span>Sunday 11:00 AM</span>
                        <p class="el-cta"><a class="btn btn-primary" href="event-single.html" role="button">Details &rarr;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>