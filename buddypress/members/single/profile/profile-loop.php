<?php do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php do_action( 'bp_before_profile_field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?> col-xs-12 col-sm-12 col-md-8 col-lg-9">

                <h5 class="side-header">General Information</h5>  

				<table class="table" style="border: 0">
                    <tr class="sr-only">
                        <th>Key</th>
                        <th>Value</th>
                    </tr>

					<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

						<?php if ( bp_field_has_data() ) : ?>

							<tr<?php bp_field_css_class(); ?>>

								<td><?php bp_the_profile_field_name(); ?></td>

								<td class="data"><?php bp_the_profile_field_value(); ?></td>

							</tr>

						<?php endif; ?>

						<?php do_action( 'bp_profile_field_item' ); ?>

					<?php endwhile; ?>

				</table>
			</div>

			<?php do_action( 'bp_after_profile_field_content' ); ?>

            <div id="right-side" class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <?php 
                /*
                 * Display some of the User's friends, if they have any
                 */
                bp_get_template_part( 'members/single/partials/members' );

                /*
                 * Display some of the User's organizations that they belong to, if any
                 */
                bp_get_template_part( 'members/single/partials/groups' );

                /*
                 * Display some of the User's resources, if they have any
                 */
                bp_get_template_part( 'members/single/partials/resources' );

                ?>
            </div>


		<?php endif; ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
