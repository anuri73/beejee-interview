<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet($kernel->getContainer()->get('doctrine.orm.entity_manager'));
