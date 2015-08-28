<?php

/**
 * Search
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div>
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
		<input type="hidden" name="action" value="bbp-search-request" />
		<input tabindex="<?php bbp_tab_index(); ?>" class="form-control" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" />
		<button id="bbp_search_submit" type="submit" class="btn btn-primary btn-search" ><span class="fa-stack">                        
                                <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                            </span>Search forums</button>

	</div>
</form>

<script type="text/javascript">
jQuery(document).ready(function($) { 
	if (window.location.search.indexOf('mfs=1') > -1)
		jQuery('#bbp_search').focus(); 
});
</script>	
