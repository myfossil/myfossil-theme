<?php do_action( 'bp_before_group_membership_requests_admin' ); ?>

    <div class="requests">
        <?php bp_get_template_part( 'groups/single/requests-loop' ); ?>
    </div>

<?php do_action( 'bp_after_group_membership_requests_admin' ); ?>
