#!/bin/bash
git pull --recurse-submodules && git submodule update --init --recursive
pushd src/wp-content/plugins/myfossil-specimen && composer update
popd
pushd src/wp-content/plugins/myfossil-logging && composer update 
popd
