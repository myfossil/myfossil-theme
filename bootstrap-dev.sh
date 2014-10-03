#!/bin/bash
git pull --recurse-submodules && git submodule update --init --recursive
cp src/wp-config.php.sample src/wp-config.php
pushd src/wp-content/plugins/myfossil-specimen && composer install
popd
pushd src/wp-content/plugins/myfossil-logging && composer install
popd
