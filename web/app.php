<?php

$autoload = require_once '../vendor/autoload.php';

require_once __DIR__.'/../app/config.php';
require_once __DIR__.'/../app/CalculatorApp.php';

$autoload->add('Calculator\\', __DIR__.'/../src');

$app = new CalculatorApp();
$app->run();