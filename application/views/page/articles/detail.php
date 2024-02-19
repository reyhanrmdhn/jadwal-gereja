<div class="subpage-head has-margin-bottom">
    <div class="container">
        <h3><?= $detail->title; ?></h3>
        <p class="lead">on <?= date('d F Y', strtotime($detail->date)); ?> by <a href="#" class="link-reverse">Admin</a></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 has-margin-bottom">
            <article class="blog-content">
                <div style="margin-bottom:20px;width:100%;height:450px;background:url(<?= base_url($detail->thumbnail) ?>);background-size:cover"></div>
                <?= $detail->content; ?>
            </article>
        </div>

        <div class="col-md-3">
            <div class="blog-search has-margin-xs-bottom">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Search..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search glyphicon-lg"></i></button>
                    </span>
                </div>
            </div>
            <div class="well">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="tag-cloud has-margin-bottom">
                <?php foreach ($articles_tags as $tags) : ?>
                    <a href="#"><?= $tags->tags;?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>