<?php

use App\Command\HelloController;
use Minicli\App;

if (php_sapi_name() !== 'cli') {
    exit;
}

require __DIR__ . '/vendor/autoload.php';

$app = new App();

$app->registerController('hello', new HelloController($app));

$app->registerCommand('help', function (array $argv) use ($app) {
    $app->getPrinter()->display("usage: minicli hello [ your-name ]");
});

$app->runCommand($argv);
