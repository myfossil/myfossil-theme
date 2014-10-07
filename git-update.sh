#!/bin/bash
git subtree pull --squash --prefix=src/wp-content/plugins/buddypress buddypress master
git subtree pull --squash --prefix=src/wp-content/plugins/bbpress bbpress master
git subtree pull --squash --prefix=src/wp-content/plugins/myfossil-logging plugin-logging master
git subtree pull --squash --prefix=src/wp-content/plugins/myfossil-specimen plugin-specimen master
git subtree pull --squash --prefix=src/wp-content/themes/myfossil theme-myfossil master
git subtree pull --squash --prefix=src/wp-core wordpress master
