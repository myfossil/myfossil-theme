<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">

	<?php if ( bbp_allow_search() ) : ?>

		<div class="bbp-search-form">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

		</div>

	<?php endif; ?>

	<?php bbp_breadcrumb(); ?>

		<div class="row">
			<div class="col-xs-8 col-xs-offset-2" id="forum-request-instructions">
				<p>To reduce confusion, we have a formal process for adding forums. To request a new forum, please post your idea in <a href="/forums/forum/2-ideas-for-new-forums/">Forum #2, Ideas for New Forums</a>. Thanks!</p>
			</div>
		</div>


	<?php bbp_forum_subscription_link(); ?>

	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>

		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>
