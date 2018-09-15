<article class="post">
    <a href="<?php the_permalink(); ?>" class="post__link row">
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
            <!-- <span>
                <?php the_category() ?>
            </span> -->
            
            <div class="post__header">
                <?php the_title( '<h3 class="post__title">', '</h3>' ); ?>
                <p>
                    Date: <?php 
                $archive_year  = get_the_time( 'Y' ); 
                $archive_month = get_the_time( 'm' ); 
                $archive_day   = get_the_time( 'd' ); 
                the_time("Y/m/d");
                ?>
                </p>
            </div>

            <div>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </a>
</article>
