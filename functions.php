<?php

/**
 * Load scripts and style sheets
 */
function load_scripts(){ 
wp_enqueue_script(
    'main.js', // ハンドル名
    get_template_directory_uri() . '/js/main.js', // ソース
    array( 'jquery' ), // 先に読み込まれているべきScript（ハンドル名） 
    filemtime( get_template_directory() . '/js/main.js' ), // バージョン情報 
    true // Bodyタグの最後でロードするか？
);
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

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
        echo '<nav class="pagination-wrapper" aria-label="Posts pages"> <ul class="pagination">';
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