<?php
use Rocketeer\Facades\Rocketeer;

Rocketeer::after( 'deploy', array(
    'npm install',
    'gulp build'
));
