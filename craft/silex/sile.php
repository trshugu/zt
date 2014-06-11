<?php
require_once(__DIR__.'/silex.phar/vendor/autoload.php');

$app = new Silex\Application();

$app->get('/hello/{name}',
  function ($name) use ($app){
    return 'hell '.$app->escape($name);
  }
);

$app->run();
