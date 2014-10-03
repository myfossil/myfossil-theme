#!/bin/bash
git submodule update --init --recursive
cp src/wp-config.php.sample src/wp-config.php
vagrant up
