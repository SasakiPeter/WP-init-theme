<!-- ここは個別ページ　ブログそれぞれの投稿の詳細をマークアップするところ。 -->
<!-- パーマリンクのリンク先といってもいい -->

<?php get_header(); ?>

<article class="single">
    <!-- header -->
    <header class="single-header is-content-header">
        <h2 class="single-title"><?php single_post_title(); ?></h2>
    </header>

    <!-- posts -->
    <?php
    // Start the loop.
    // have_posts()はこのsingle.phpに渡されている全ての投稿のこと
    while ( have_posts() ) :
        the_post();
    ?>
    <section class="page">
    <?php the_content() ?>
    </section>
    <?php endwhile;?>
</article>

<?php get_footer(); ?>