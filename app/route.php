<?php


$app->get('/', \App\Controller\index::class . ':index');

$app->map(['GET','POST'],'/login', \App\Controller\Login::class . ':index')->setName('login');






