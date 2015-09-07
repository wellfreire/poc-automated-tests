<?php

$autoload = require_once '../vendor/autoload.php';

require_once __DIR__.'/../app/config.php';

require_once __DIR__.'/../app/CalculatorApp.php';

$app = new CalculatorApp();
$app->run();