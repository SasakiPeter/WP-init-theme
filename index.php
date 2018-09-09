<!-- Get header -->
<?php get_header(); ?>

<div class="main col-12 col-md-9">
    <section class="index">
        <!-- posts -->
        <div class="index-posts is-posts-container">
            <?php
            // Start the loop the_post()はループの中でしか使えない
            // このループ文はWPDB内の投稿を展開しているだけ
            while (have_posts()):
                the_post();
            ?>
            <!-- content-pageを呼んでいる -->
            <?php get_template_part("content","page"); ?>
            <?php endwhile;?>
        </div>
        <!-- paginaiton -->
        <?php if (function_exists("pagination")) {
            pagination($additional_loop->max_num_pages);
        } ?>
        
    </section>
</div> <!-- col-9 -->

<div class="sidebar  col-12 col-md-3 mt-3 mb-3 px-2">
    <?php get_sidebar(); ?>
</div>

<!-- Get footer -->
<?php get_footer(); ?>