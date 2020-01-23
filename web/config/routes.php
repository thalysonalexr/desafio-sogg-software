<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', \App\Handler\Home::class, 'home.get');
    $app->get('/cliente/editar/{id}', \App\Handler\Edit::class, 'edit.get');
    $app->post('/cliente/editar/{id}', \App\Handler\EditPost::class, 'edit.post');
    $app->get('/cliente/novo', \App\Handler\Register::class, 'register.get');
    $app->post('/cliente/novo', \App\Handler\RegisterPost::class, 'register.post');
    $app->get('/cliente/remover/{id}', \App\Handler\Remove::class, 'remove.get');
};
