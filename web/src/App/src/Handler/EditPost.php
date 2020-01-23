<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

use App\Models\User\DAO\UserDAO;

class EditPost implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $id = $request->getAttribute('id');
        $dao = new UserDAO();

        $dao->edit((int) $id, $request->getParsedBody());

        return new RedirectResponse('/cliente/editar/' . $id);
    }
}
