# BuddyPress Groups Template

## Filters

Throughout this templating effort, we're going to need to use filter hooks
to do some of our templating.

These are contained in `filters.php` or `single/filters.php` where appropriate.

### Sub-navigation

Defined in `single/filters.php`.

| Filter                        | Routes to...                  |
| ----------------------------- | ----------------------------- |
| `bp_get_options_nav_groups`   | `single/home.php`             |
| `bp_get_options_nav_members`  | `single/members.php`          |
| `bp_get_options_nav_invite`   | `single/send-invites.php`     |
| `bp_get_options_nav_admin`    | `single/admin.php`            |

