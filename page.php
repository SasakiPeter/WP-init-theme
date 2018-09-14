<!-- ここが固定ページ -->

<?php get_header( ); ?>

<?php
    // Start the loop.
    while ( have_posts() ) :
        the_post();
?>
    <section class="page">
        <header class="page-header is-content-header">
            <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
            <span class="badge badge-primary">
                <?php the_category() ?>
            </span>
        </header>
        <article class="page-content row">
            <?php the_content() ?>
        </article>
        <footer>
            <div>
                <!-- date link -->
                <p>
                    Date: <?php 
                // Get post date
                $archive_year  = get_the_time( 'Y' ); 
                $archive_month = get_the_time( 'm' ); 
                $archive_day   = get_the_time( 'd' ); 
                ?>
                    <a href="<?= get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><?php the_time("Y/m/d") ?></a>
                </p>
            </div>
        </footer>
    </section>
<?php endwhile?>

<?php get_footer( );?>