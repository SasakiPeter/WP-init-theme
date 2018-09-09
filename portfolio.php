<!-- ここが固定ページ -->

<?php
/*
Template Name:Portfolio
*/
?>

<?php get_header( ); ?>

<?php
    // Start the loop.
    while ( have_posts() ) :
        the_post();
?>
    <section class="page">
        <header class="page-header is-content-header">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <?php 
                        $path=get_bloginfo( 'stylesheet_directory' )."/slide.json";
                        // $path=get_stylesheet_directory_url()."/slide.json";
                        $images=json_decode(file_get_contents($path));
                        foreach ($images as $img) : ?>
                        <?php if ($img->active==True):?>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= get_bloginfo( 'stylesheet_directory' )?><?=$img->path ?>" alt="<?=$img->name?>">
                        </div>
                        <?php else : ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= get_bloginfo( 'stylesheet_directory' )?><?=$img->path ?>" alt="<?=$img->name?>">
                        </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
        </header>
        <article class="page-content row">
            <?php the_content() ?>
        </article>
    </section>
<?php endwhile?>

<?php get_footer( );?>