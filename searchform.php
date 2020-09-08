<form role="search" method="get" id="searchform" class="search" action="<?php echo get_home_url('/'); ?>/" >
	<input type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php string_translate('Search...', 'Поиск...'); ?>" />
    <button type="submit">
        <svg class="svgIcon iconSearch">
            <use xlink:href="#iconSearch"></use>
        </svg>
    </button>
</form>
