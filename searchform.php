<form role="search" method="get" action="<?= esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="search" class="form-control" placeholder="検索..." value="<?= get_search_query(); ?>" name="s" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><span>検索</span></button>
        </span>
    </div>
</form>