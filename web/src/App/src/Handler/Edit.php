<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Diactoros\Response\HtmlResponse;

use App\Models\User\DAO\UserDAO;

class Edit implements RequestHandlerInterface
{
    private $template;

    public function __construct(?TemplateRendererInterface $template = null) {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $dao = new UserDAO();
        
        $cliente['cliente'] = $dao->findById((int) $request->getAttribute('id'));

        return new HtmlResponse($this->template->render('app::edit', $cliente));
    }
}
