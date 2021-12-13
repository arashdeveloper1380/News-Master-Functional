<?php
require_once(BASE_PATH . "/template/app/layouts/head-tag.php");
?>

    <section class="content">
        <section class="container">
            <main class="main">
                <section class="main-crypto-mining-news">
                    <h2 class="title"><?= $category['name']; ?></h2>
                    <?php foreach($articles as $article) {?>
                    <section class="main-news-w-50">
                        <article>
                            <img class="main-news-img" src="<?= asset($article['image']); ?>" alt="">
                            <h3 class="article-title">
                                <a href="<?= url('show-article/' . $article['id']); ?>"><?= $article['title']; ?></a>
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
                </section><!--end of main crypto mining news-->
            </main><!--end of main-->

            <?php
        require_once(BASE_PATH . "/template/app/layouts/sidebar.php");
        ?>


            <section class="clear-fix"></section>
        </section><!--end of container-->
    </section><!--end of content-->
    </section><!--end of first app section-->



    <?php
require_once(BASE_PATH . "/template/app/layouts/footer.php");
?>