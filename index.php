<!-- Get header -->
<?php get_header(); ?>

<div class="main col-12 col-lg-9">
    <section class="index">
        <!-- posts -->
        <div class="index-posts is-posts-container">
            <?php
            while (have_posts()):
                the_post();
            ?>
            <?php get_template_part("content","page"); ?>
            <?php endwhile;?>
        </div>
        <!-- paginaiton -->
        <?php if (function_exists("pagination")) {
            pagination($additional_loop->max_num_pages);
        } ?> 
    </section>
</div> 

<div class="sidebar  col-12 col-lg-3">
    <?php get_sidebar(); ?>
</div>

<!-- Get footer -->
<?php get_footer(); ?>