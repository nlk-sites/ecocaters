<div class="pad20">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="inputSearch" />
<input type="submit" id="searchsubmit" value="<?php _e('Search', 'kubrick'); ?>" class="searchPos" />
</form>
</div>
