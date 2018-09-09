<?php

// Support To Post Thumbnail
add_theme_support('post-thumbnails');

function widgets_init(){
    register_sidebar(array(
        'name'          => 'Sidebar Widget',
        'id'            => 'sidebar-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'description'   => 'サイドバーにウィジットを追加します',
        'class'         => 'footer-left-widget',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => 'footer Widget',
        'id'            => 'footer-left-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'description'   => 'フッターにウィジットを追加します',
        'class'         => 'footer-left-widget',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ));
    // dynamic_sideber関数でidを指定すると呼び出される
    // before_widgetにはpages-2というIDとwidget_pagesというclassが入っている。
    
    register_sidebar(array(
        'name'          => 'Navbar Widget',
        'id'            => 'navbar-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'description'   => 'ナブバーにウィジットを追加します',
        'class'         => 'header-right-widget',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init','widgets_init');

function my_the_excerpt($postContent){
    $postContent = mb_strimwidth($postContent,0,40,"...","UTF-8");
    return $postContent;
}
add_filter('the_excerpt','my_the_excerpt');

add_theme_support( 'title-tag' );


/* $rangeの値で出力されるページナンバーの範囲を設定 */
function pagination($pages = '', $range = 1){
    $showitems = ($range * 2)+1;  
   
    global $paged;
    if(empty($paged)){
        $paged = 1;
    }

    /* ここで全体のページ数を取得 */
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
      }
    }
   
    /* ページ数が1じゃなければ */
    if(1 != $pages){
        echo '<nav aria-label="Posts pages"> <ul class="pagination">';
    }
    /* 1番最初のページに戻るボタン */
    if($paged > 2 && $paged > $range+1 && $showitems < $pages){
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span></a></li>';
    }
    
    // /* 1つ前のページへボタン */
    // if($paged > 1 && $showitems < $pages){
    //     echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous">
    //     <span aria-hidden="true">&laquo;</span>
    //     <span class="sr-only">Previous</span></a></li>';
    // }
   
    /* ページナンバーの出力。$pagedが一致した場合はcurrentを、一致しない場合はリンクを生成 */
    for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
            echo ($paged == $i)? '<li class="page-item active"><span class="page-link">'.$i.'</span></li>':'<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
        }
    }
   
    /* ページ数が続くことを示す３点リーダー */
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
        echo '<li class="page-item disabled"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" tabindex="-1">...</a></li>';
    }
   
    // /* 1つ次のページへボタン */
    // if ($paged < $pages && $showitems < $pages){
    //     echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next">
    //     <span aria-hidden="true">&raquo;</span>
    //     <span class="sr-only">Next</span></a></li>';
    // }

    /* 最後のページへ進むボタン */
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span></a></li>';
    }
   
    echo "</ul></nav>";
}


class pages extends WP_Widget{

    // constructor
    function pages(){
        parent::WP_Widget(
            false,
            $name = "pages",
            array("description"=>"ページ一覧表示",)
        );
    }

    // 管理画面の設定や、表示用コードを記述する
    function form($instance){
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('表示する投稿数:'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo esc_attr( $instance['limit'] ); ?>" size="3">
        </p>
    <?php
    }

    // 管理画面で設定を変更した時の処理を書く
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['limit'] = is_numeric($new_instance['limit']) ? $new_instance['limit'] : 5;
        return $instance;
    }

    // ウィジェットを配置した時の表示用コードを書く←つまり、HTML？
    function widget($args, $instance){
        extract( $args );
 
        if($instance['title'] != ''){
            $title = apply_filters('widget_title', $instance['title']);
        }
        echo $before_widget;
        if( $title ){
            echo $before_title . $title . $after_title;
        }
        ?>
        <ul class="img-new-post clearfix">
            <?php
                query_posts("posts_per_page=".$instance['limit']);
                if(have_posts()):
                while(have_posts()): the_post();
            ?>
            <li>
            <?php if( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(400,400) ); ?></a>
            <?php else: ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg" alt=""></a>
            <?php endif; ?>
            <div><p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br><span class="img-new-post-date"><?php echo get_the_date('Y/n/j'); ?></span></p></div>
            </li>
            <?php endwhile; endif; ?>
        </ul>
        <?php
        echo $after_widget;
    }
}

register_widget('pages');