<?php
use Rocketeer\Facades\Rocketeer;

Rocketeer::after( 'deploy', array(
    'composer self-update',
    'composer install',
    'npm install --cache',
    'gulp build --production'
));
