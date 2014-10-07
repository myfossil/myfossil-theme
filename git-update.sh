#!/bin/bash
git subtree pull --squash --prefix=src/wp-content/plugins/buddypress git@github.com:myfossil/BuddyPress.git master
git subtree pull --squash --prefix=src/wp-content/plugins/bbpress git@github.com:myfossil/bbpress.git master
git subtree pull --squash --prefix=src/wp-content/plugins/myfossil-logging git@github.com:myfossil/wp-plugin-logging.git master
git subtree pull --squash --prefix=src/wp-content/plugins/myfossil-specimen git@github.com:myfossil/wp-plugin-specimen.git master
git subtree pull --squash --prefix=src/wp-content/themes/myfossil git@github.com:myfossil/wp-theme-myfossil.git master
git subtree pull --squash --prefix=src/wp-core git@github.com:myfossil/WordPress.git master
