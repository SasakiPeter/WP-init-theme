<!-- ここが固定ページ -->

<?php
/*
Template Name:Home
*/
?>

<?php get_header( ); ?>

<?php
    while ( have_posts() ) :
        the_post();
?>
    <section class="page front-page">
        <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
        <article class="page-content row">
            <?php the_content() ?>
        </article>
    </section>
    <!-- <div class="animation">
        <span class="btn">Third
        <span class="inner"></span>
        </span>
    </div> -->
    <!-- <section class="opening">
        <div class="name">
            <div class="name__char">
                <span class="char char-1">S</span>
            </div>
            <div class="name__char">
                <span class="char char-1">A</span>
            </div>
            <div class="name__char">
                <span class="char char-1">I</span>
            </div>
            <div class="name__char">
                <span class="char char-1">S</span>
            </div>
            <div class="name__char">
                <span class="char char-1">H</span>
            </div>
            <div class="name__char">
                <span class="char char-1">I</span>
            </div>
            <div class="name__char">
                <span class="char char-1">K</span>
            </div>
            <div class="name__char">
                <span class="char char-1">I</span>
            </div>
            <div class="name__char">
                <span class="char char-1">S</span>
            </div>
            <div class="name__char">
                <span class="char char-1">A</span>
            </div>
            <div class="name__char">
                <span class="char char-1">N</span>
            </div>
            <div class="name__char">
                <span class="char char-1">C</span>
            </div>
            <div class="name__char">
                <span class="char char-1">H</span>
            </div>
            <div class="name__char">
                <span class="char char-1">U</span>
            </div>
        </div>
    </section> -->
<?php endwhile?>

<?php get_footer( );?>