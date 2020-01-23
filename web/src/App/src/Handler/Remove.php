<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

use App\Models\User\DAO\UserDAO;

class Remove implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $dao = new UserDAO();

        $dao->remove((int) $request->getAttribute('id'));

        return new RedirectResponse('/');
    }
}
