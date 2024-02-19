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


<div class="highlight-bg has-margin-bottom">
    <div class="container event-list">
        <div class="section-title">
            <h4> PROGRAMS &amp; EVENTS </h4>
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


<div class="container has-margin-bottom">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title left-align-desktop">
                <h4> LATEST BULLETIN </h4>
            </div>

            <?php foreach ($articles as $articles) : ?>
                <div class="row has-margin-bottom">
                    <div class="col-md-4 col-sm-4"> <img class="img-responsive center-block" src="<?= base_url($articles->thumbnail) ?>" alt="bulletin blog"> </div>
                    <div class="col-md-8 col-sm-8 bulletin">
                        <h4 class="media-heading"><?= $articles->title; ?></h4>
                        <p>on <?= date('d F Y', strtotime($articles->date)); ?> by <a href="#" class="link-reverse">Admin</a></p>
                        <p><?= $articles->excerpt; ?></p>
                        <a class="btn btn-primary" href="<?= base_url('articles/' . $articles->slug) ?>" role="button">Read Article →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>



<div class="container has-margin-bottom">
    <div class="section-title">
        <h4> OUR GALLERY </h4>
    </div>
    <div class="img-gallery row">
        <?php foreach ($home_gallery as $gallery) : ?>
            <div class="col-sm-4 col-md-3">
                <a class="fancybox" href="<?= base_url($gallery->image) ?>" data-fancybox-group="gallery" title="church image gallery">
                    <div class="image-thumbnail" style="background: url(<?= base_url($gallery->image) ?>);background-size:cover;width:270px;height:270px;margin-bottom:20px"></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="highlight-bg">
    <div class="container event-list">
        <div class="section-title">
            <h4> BIBLE QUOTES </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel2">
                    <?php foreach ($home_quotes as $quotes) : ?>
                        <div class="item">
                            <blockquote class="blockquote-centered"><?= html_entity_decode($quotes->quotes); ?></blockquote>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>