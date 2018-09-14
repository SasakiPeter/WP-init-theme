<article class="post">
    <a href="<?php the_permalink(); ?>" class="row">
        <div class="post__thumbnail thumbnail col-5">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail(array(),array('class' => "thumbnail__img",));
            }
            else {
                echo '<img class="thumbnail__img" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg"/>';
            }
            ?>
        </div>
        <div class="col-7">
            <!-- category link -->
            <!-- jQueryでタグによって、badgeの色変えたい -->
            <!-- the_categoryはaタグにタグを突っ込んだものを出力する -->
            <!-- categoryは一記事につき一つが基本 -->
            <!-- the_categoryは勝手にリンクになってくれちゃっている -->
            <!-- <span class="badge badge-primary">
                <?php the_category() ?>
            </span> -->
            <?php the_title( '<h3 class="post__title">', '</h3>' ); ?>

            <!-- content -->
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <div>
                <p>
                    Date: <?php 
                // Get post date
                $archive_year  = get_the_time( 'Y' ); 
                $archive_month = get_the_time( 'm' ); 
                $archive_day   = get_the_time( 'd' ); 
                the_time("Y/m/d");
                ?>
                </p>
            </div>
        </div>
    </a>
</article>
