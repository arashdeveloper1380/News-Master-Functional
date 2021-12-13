<?php
require_once(BASE_PATH . "/template/admin/layouts/head-tag.php");
?>

                <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Show Menu</h1>
    </section>

    <section class="row my-3">
        <section class="col-12">
            <h1 class="h4 border-bottom">name <?= $menu['name'] ?></h1>
            <p class="h4 border-bottom">url : <?= $menu['url'] ?></p>
            <p class="h4 border-bottom">parent ID : <?= $menu['parent_id'] ?></p>
        </section>
    </section>

        </main>
    </div>
</div>

<?php
require_once(BASE_PATH . "/template/admin/layouts/footer.php");
?>
