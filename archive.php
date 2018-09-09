<?php get_header(); ?>

<section>
    <?php if ( have_posts() ) : ?>
    <header class="is-content-header">
        <?php
        the_archive_title( '<h2>', '</h2>' );
        the_archive_description( '<section>', '</section>' );
        ?>
    </header>
    <!-- .page-header -->
    <div class="is-posts-container">
        <?php
        // Start the loop.
        while ( have_posts() ) :
            the_post();
        ?>
        <?php get_template_part( "content", "page" ); ?>
        <?php endwhile;?>
    </div>
    <?php endif;?>
</section>

<?php get_footer(); ?>