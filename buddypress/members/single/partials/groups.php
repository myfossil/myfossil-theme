<?php
/**
 * BuddyPress - Users Groups
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

$n_groups_to_show = 5;
$n_groups_shown = 0;

?>
<?php if ( bp_has_groups( 'user_id=' . bp_displayed_user_id() ) ): ?>
    <h5 class="side-header">Groups</h5>
    <div id="side-organizations">
        <ul id="group-list" class="item-list" role="main">
            <?php while ( bp_groups() ) : bp_the_group(); ?>
                <?php
                // limit number of groups to show in the list
                if ( $n_groups_shown < $n_groups_to_show ) {
                    ?>
                    <li>
                        <a href="<?php bp_group_permalink(); ?>">
                            <?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?>
                        </a>
                    </li>
                    <?php
                }

                $n_groups_shown++;
                ?>
            <?php endwhile; ?>
        </ul>
        <?php
        $n_groups = $n_groups_shown;
        if ( $n_groups > $n_groups_to_show ) {
            printf("<div class=\"pull-right clearfix\"><a href=\"groups\">See all %d</a></div>", $n_groups );
        }
        ?>
    </div>
<?php endif; ?>
