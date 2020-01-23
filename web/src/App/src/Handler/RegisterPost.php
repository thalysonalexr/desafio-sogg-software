<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

use App\Models\User\DAO\UserDAO;

class RegisterPost implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $dao = new UserDAO();

        $body = $request->getParsedBody();

        if (
            (isset($body['nome']) && !empty($body['nome'])) &&
            (isset($body['cpf']) && !empty($body['cpf'])) &&
            (isset($body['data_nasc']) && !empty($body['data_nasc'])) &&
            (isset($body['email']) && !empty($body['email']))
        ) {
            $dao->create($body);
        }

        return new RedirectResponse('/');
    }
}
