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
			<div class="col-xs-10 col-xs-offset-1" id="forum-request-instructions">
				<p>To reduce confusion, we have a formal process for adding new forums. To request a new Forum, please send an email with a detailed explanation to the myFOSSIL webmaster at <a href="mailto:fossil@flmnh.ufl.edu">fossil@flmnh.ufl.edu</a>.</p>
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
