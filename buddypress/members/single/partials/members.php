<?php
/**
 * BuddyPress - Users Friends
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

$n_members_to_show = 4;
$n_members_shown = 0;

?>
<?php if ( bp_has_members( 'user_id=' . bp_displayed_user_id() ) ): ?>
    <h5 class="side-header">Friends</h5>
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
        $n_members = $n_members_shown;
        if ( $n_members > $n_members_to_show ) {
            printf("<div class=\"pull-right clearfix\"><a href=\"%s/friends\">See all %d</a></div>", bp_core_get_user_domain( bp_displayed_user_id() ), $n_members );
        }
        ?>
    </div>
<?php endif; ?>
