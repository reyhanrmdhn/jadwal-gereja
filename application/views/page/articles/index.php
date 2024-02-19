<div class="subpage-head has-margin-bottom">
    <div class="container">
        <h3>Our Blog</h3>
        <p class="lead">Articles and latest bulletins related to our catholic church</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 has-margin-bottom">
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

            <div class="text-center center-block">
                <?= $pagination; ?>
            </div>
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
                    <a href="#"><?= $tags->tags; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>