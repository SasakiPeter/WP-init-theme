<!-- 引数にとっているのはID -->
<?php if ( is_active_sidebar( 'sidebar-widget' ) ) : ?>
    <div class="sidebar__widget" role="complementary">
        <?php dynamic_sidebar( 'sidebar-widget' ); ?>
    </div>
<?php endif; ?>