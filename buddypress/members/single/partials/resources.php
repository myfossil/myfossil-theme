<?php
/**
 * BuddyPress - Users Resources
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/*
 * Disabled for now
 * TODO re-enable after Resources are complete
 */
/*
$n_members_to_show = 5;
$n_members_shown = 0;

?>
<?php if ( bp_has_members( 'user_id=' . bp_displayed_user_id() ) ): ?>
    <h5 class="side-header">Resources</h5>  
    <div id="side-resources">
        <ul id="member-list" class="item-list" role="main">
            <?php while ( bp_members() ) : bp_the_member(); ?>
                <?php
                // limit number of members to show in the list
                if ( $n_members_shown < $n_members_to_show ) {
                    ?>
                    <li>
                        <a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
                    </li>
                    <?php
                }

                $n_members_shown++;
                ?>
            <?php endwhile; ?>
        </ul>
        <?php
        $n_members = $n_members_shown + 1;
        if ( $n_members > $n_members_to_show ) {
            printf("<div class=\"pull-right clearfix\"><a href=\"members\">Sell all %d</a></div>", $n_members );
        }
        ?>
    </div>
<?php endif; ?>
*/
?>
