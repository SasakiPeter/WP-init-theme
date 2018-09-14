<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<header>
    <h2>検索結果：<?= esc_html( get_search_query()) ?> </h2>
</header>

<section>
<?php
while ( have_posts() ) {
    the_post();
    get_template_part( 'content', 'page' );
} 
?>
</section>
<?php endif; ?>

<?php get_footer(); ?>