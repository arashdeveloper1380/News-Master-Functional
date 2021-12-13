<?php
require_once(BASE_PATH . "/template/app/layouts/head-tag.php");
?>

    <section class="content">

        <section class="container">
            <main class="main">
                <section class="main-news">
                    <h2 class="title"><?= $article['title']; ?></h2>
                    <article>

                        <img class="main-news-img" src="<?= asset($article['image']); ?>" alt="">
                        <h3 class="article-title">
                            <a href="<?= url('show-article/' . $article['id']) ?>"><?= $article['title']; ?></a>
                        </h3>
                        <ul class="info-bar">
                            <li class=""><span class="text-muted">by</span> <a href="#" class="color-black"><b><?= $username['username']; ?>,</b></a>
                                <span class="text-muted"><?= date("M d, Y",strtotime($article['created_at']));?></span></li>
                            <li><i class="fas fa-bolt text-yellow"></i> <?= $article['view']; ?></li>
                            <li><i class="fas fa-comments text-yellow"></i> <?= $commentsCount["COUNT(*)"]; ?></li>
                        </ul>
                        <p><?= $article['summary']; ?></p>

                        <p class="footer-p-margin-20"> <?= $article['body']; ?></p>

                    </article>

                    <?php foreach($comments as $comment) {?>
                        <section class="comment-box">
                            <h3 class="comment-box-header">
                            <?= $comment['username']?>
                                <span class="comment-box-date"><?= date("M d, Y",strtotime($comment['created_at']));?></span>
                            </h3>
                            <comment>
                              <?= $comment['comment']?>
                            </comment>
                        </section>
                    <?php }
                     if(isset($_SESSION['user'])){
                        ?>
    
                        <form action="<?= url('comment-store') ?>" method="post">
                            <input name="article_id" type="hidden" value="<?= $id; ?>">
                            <textarea class="comment" name="comment" rows="4" required placeholder="your comment ..."></textarea>
                            <input class="submit" type="submit" value="store comment">
                        </form>
                        <?php }?>

                </section><!--end of main news-->


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