<!-- ここは個別ページ -->

<?php get_header(); ?>

<article class="single">
    <!-- header -->
    <header class="single__header">
        <h2 class="single__title"><?php single_post_title(); ?></h2>
        <!-- date link -->
        <p class="single__date">
            Date: <?php 
        $archive_year  = get_the_time( 'Y' ); 
        $archive_month = get_the_time( 'm' ); 
        $archive_day   = get_the_time( 'd' ); 
        ?>
            <a href="<?= get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><?php the_time("Y/m/d") ?></a>
        </p>
        <span class="badge badge-primary single__category">
            <?php the_category() ?>
        </span>
    </header>

    <!-- posts -->
    <?php
    while ( have_posts() ) :
        the_post();
    ?>
    <section class="page">
    <?php the_content() ?>
    </section>
    <?php endwhile;?>
</article>

<?php get_footer(); ?>