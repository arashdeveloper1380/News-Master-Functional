<?php
require_once(BASE_PATH . "/template/app/layouts/head-tag.php");
?>

<section class="content">
    <section class="intro intro-h-600px">
        <section class="intro-row intro-h-2-3 mb-10x">
            <?php if(isset($articles[0])) {?>
            <section class="intro-2-3-col intro-h-100 position-relative h-md-300px">
                <a href="<?= url('/show-article/' . $articles[0]['id']); ?>">
                    <section class="intro-2-3-item img-bg intro-h-100" style="background: url(<?= asset($articles[0]['image']); ?>) no-repeat center; background-size: cover;"></section>
                    <section class="intro-item-caption">
                        <h3 class="caption-title">
                            <span><?= $articles[0]['title']; ?></span>
                        </h3>
                        <ul class="caption-info-bar">
                            <li class="">by <b class="text-yellow"><?= $articles[0]['username']; ?></b> <?= date("M d, Y",strtotime($articles[0]['created_at']));?></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[0]['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $articles[0]['comments_count']; ?></li>
                        </ul>
                    </section>
                </a>
            </section>
            <?php }?>
            <section class="intro-1-3-col intro-h-100">
            <?php if(isset($articles[1])) {?>
                <section class="intro-1-3-item intro-h-50 position-relative h-md-300px">
                    <a href="<?= url('/show-article/' . $articles[1]['id']); ?>">
                        <section class="img-bg intro-h-100" style="background: url(<?= asset($articles[1]['image']); ?>) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <b><?= $articles[1]['title']; ?></b>
                            </h3>
                            <ul class="caption-info-bar">
                                <li><?= date("M d, Y",strtotime($articles[1]['created_at']));?></li>
                                <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[1]['view']; ?></li>
                                <li><i class="fas fa-comments text-yellow"></i> <?= $articles[1]['comments_count']; ?></li>
                            </ul>
                        </section>
                    </a>

                </section>
            <?php }?>

            <?php if(isset($articles[2])) {?>

                <section class="intro-1-3-item intro-h-50 position-relative h-md-300px">
                    <a href="<?= url('/show-article/' . $articles[2]['id']); ?>">
                        <section class="img-bg intro-h-100" style="background: url(<?= asset($articles[2]['image']); ?>) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <b><?= $articles[2]['title']; ?></b>
                            </h3>
                            <ul class="caption-info-bar">
                                <li><?= date("M d, Y",strtotime($articles[2]['created_at']));?></li>
                                <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[2]['view']; ?></li>
                                <li><i class="fas fa-comments text-yellow"></i> <?= $articles[2]['comments_count']; ?></li>
                            </ul>
                        </section>
                    </a>
                </section>
            <?php }?>

            </section>
            <section class="clear-fix"></section>
        </section>

        <?php if(isset($articles[3])) {?>

        <section class="intro-row intro-h-1-3">
            <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                <a href="<?= url('/show-article/' . $articles[3]['id']); ?>">
                    <section class="img-bg intro-h-100" style="background: url(<?= asset($articles[3]['image']); ?>) no-repeat center; background-size: cover;"></section>
                    <section class="intro-item-caption">
                        <h3 class="caption-title">
                            <b><?= $articles[3]['title']; ?></b>
                        </h3>
                        <ul class="caption-info-bar">
                            <li><?= date("M d, Y",strtotime($articles[3]['created_at']));?></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[3]['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $articles[3]['comments_count']; ?></li>
                        </ul>
                    </section>
                </a>
            </section>
            <?php }?>

            <?php if(isset($articles[4])) {?>

            <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                <a href="<?= url('/show-article/' . $articles[4]['id']); ?>">
                    <section class="img-bg intro-h-100" style="background: url(<?= asset($articles[4]['image']); ?>) no-repeat center; background-size: cover;"></section>
                    <section class="intro-item-caption">
                        <h3 class="caption-title">
                            <b><?= $articles[4]['title']; ?></b>
                        </h3>
                        <ul class="caption-info-bar">
                            <li><?= date("M d, Y",strtotime($articles[4]['created_at']));?></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[4]['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $articles[4]['comments_count']; ?></li>
                        </ul>
                    </section>
                </a>
            </section>
            <?php }?>
            <?php if(isset($articles[5])) {?>

            <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                <a href="<?= url('/show-article/' . $articles[5]['id']); ?>">
                    <section class="img-bg intro-h-100" style="background: url(<?= asset($articles[5]['image']); ?>) no-repeat center; background-size: cover;"></section>
                    <section class="intro-item-caption">
                        <h3 class="caption-title">
                            <b><?= $articles[5]['title']; ?></b>
                        </h3>
                        <ul class="caption-info-bar">
                            <li><?= date("M d, Y",strtotime($articles[5]['created_at']));?></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $articles[5]['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $articles[5]['comments_count']; ?></li>
                        </ul>
                    </section>
                </a>
            </section>
            <?php }?>

            <section class="clear-fix"></section>
        </section>
    </section>
    <!--end of intro-->
    <section class="container">
        <main class="main">

            <section class="main-crypto-mining-news">
                <h2 class="title">POPULAR POSTS</h2>
                <?php foreach($popularArticles as $article) {?>
                <section class="main-news-w-50">
                    <article>
                        <img class="main-news-img" src="http://localhost/admin-panel/<?= $article['image']; ?>" alt="">
                        <h3 class="article-title">
                            <a href="<?= url('/show-article/' . $articles[0]['id']); ?><?= $article['id']; ?>"><?= $article['title']; ?></a>
                        </h3>
                        <ul class="info-bar">
                            <li class=""><span class="text-muted">by</span> <a href="#" class="color-black"><b><?= $article['username']; ?>,</b></a>
                                <span class="text-muted"><?= date("M d, Y",strtotime($article['created_at']));?></span></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $article['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $article['comments_count']; ?></li>
                        </ul>
                    </article>
                </section>
                <?php }?>


                <section class="clear-fix"></section>
            </section>
            <!--end of main crypto mining news-->
        </main>
        <!--end of main-->


        <?php
        require_once(BASE_PATH . "/template/app/layouts/sidebar.php");
        ?>


        <section class="clear-fix"></section>
    </section>
    <!--end of container-->
</section>
<!--end of content-->
</section>
<!--end of first app section-->





<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>