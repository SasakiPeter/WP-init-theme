<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="is-content-header">
    <h2>検索結果：<?= esc_html( get_search_query()) ?> </h2>
</header><!-- .page-header -->

<section class="is-posts-container" >
<?php
while ( have_posts() ) {
    the_post();
    get_template_part( 'content', 'page' );
} 
?>
</section>
<?php endif; ?>

<?php get_footer(); ?>