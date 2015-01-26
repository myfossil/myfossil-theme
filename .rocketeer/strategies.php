<?php
use Rocketeer\Binaries\PackageManagers\Composer;
use Rocketeer\Tasks\Subtasks\Primer;

return array(

	// Which strategy to use to check the server
	'check'        => 'Php',

	// Which strategy to use to create a new release
	'deploy'       => 'Sync',
);
