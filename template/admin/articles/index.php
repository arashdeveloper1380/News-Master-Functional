<?php
require_once(BASE_PATH . "/template/admin/layouts/head-tag.php");
?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5 "><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url('article/create') ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of articles</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>user ID</th>
                <th>cat ID</th>
                <th>image</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><a class="text-primary" href="<?= url('article/show/' . $article['id']) ?>"><?= $article['id'] ?></a></td>
                <td><?= $article['title'] ?></td>
                <td><?= $article['summary'] ?></td>
                <td><?= $article['view'] ?></td>
                <td><?= $article['user_id'] ?></td>
                <td><?= $article['cat_id'] ?></td>
                <td><img style="width: 80px;" src="<?= asset($article['image']) ?>"
                         alt=""></td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white"
                       href="<?= url('article/edit/' . $article['id']) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white"
                       href="<?= url('article/delete/' . $article['id']) ?>">delete</a>
                </td>
            </tr>
    <?php } ?>
<!--            <tr>-->
<!--                <td><a class="text-primary" href="http://localhost/admin-panel/article/show/2">2</a></td>-->
<!--                <td>title</td>-->
<!--                <td>summary</td>-->
<!--                <td>view</td>-->
<!--                <td>user_id</td>-->
<!--                <td>cat_id</td>-->
<!--                <td><img style="width: 80px;" src="" alt=""></td>-->
<!--                <td>-->
<!--                    <a role="button" class="btn btn-sm btn-primary text-white" href="http://localhost/admin-panel/article/edit/2">edit</a>-->
<!--                    <a role="button" class="btn btn-sm btn-danger text-white" href="http://localhost/admin-panel/article/delete/2">delete</a>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td><a class="text-primary" href="http://localhost/admin-panel/article/show/3">3</a></td>-->
<!--                <td>title</td>-->
<!--                <td>summary</td>-->
<!--                <td>view</td>-->
<!--                <td>user_id</td>-->
<!--                <td>cat_id</td>-->
<!--                <td><img style="width: 80px;" src="" alt=""></td>-->
<!--                <td>-->
<!--                    <a role="button" class="btn btn-sm btn-primary text-white" href="http://localhost/admin-panel/article/edit/3">edit</a>-->
<!--                    <a role="button" class="btn btn-sm btn-danger text-white" href="http://localhost/admin-panel/article/delete/3">delete</a>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td><a class="text-primary" href="http://localhost/admin-panel/article/show/4">4</a></td>-->
<!--                <td>title</td>-->
<!--                <td>summary</td>-->
<!--                <td>view</td>-->
<!--                <td>user_id</td>-->
<!--                <td>cat_id</td>-->
<!--                <td><img style="width: 80px;" src="" alt=""></td>-->
<!--                <td>-->
<!--                    <a role="button" class="btn btn-sm btn-primary text-white" href="http://localhost/admin-panel/article/edit/4">edit</a>-->
<!--                    <a role="button" class="btn btn-sm btn-danger text-white" href="http://localhost/admin-panel/article/delete/4">delete</a>-->
<!--                </td>-->
<!--            </tr>-->
        </tbody>

    </table>
</div>



<?php
require_once(BASE_PATH . "/template/admin/layouts/footer.php");
?>