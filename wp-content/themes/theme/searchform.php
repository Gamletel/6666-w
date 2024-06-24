<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <label class="screen-reader-text" for="s">Поиск: </label>

    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s"  placeholder="К примеру, шумоизоляция"/>

    <input type="submit" id="searchsubmit" class="btn invert" value="НАЙТИ" />
</form>