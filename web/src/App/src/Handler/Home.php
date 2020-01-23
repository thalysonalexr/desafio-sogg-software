<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Diactoros\Response\HtmlResponse;

use App\Models\User\DAO\UserDAO;

class Home implements RequestHandlerInterface
{
    private $template;

    public function __construct(?TemplateRendererInterface $template = null) {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $dao = new UserDAO();

        $filter = $request->getQueryParams();
        $clientes = $dao->all();

        $filtered = [];

        // filtra pelo campo nome
        if (isset($filter['nome']) && !empty($filter['nome'])) {
            foreach ($clientes as $object) {
                if (strpos(strtolower($object->getNome()), strtolower($filter['nome'])) !== false) {
                    $filtered[] = $object;
                }
            }
        }
        
        if (isset($filter['cpf']) && !empty($filter['cpf'])) {
            foreach ($clientes as $object) {
                if (strpos(strtolower($object->getCpf()), strtolower($filter['cpf'])) !== false) {
                    $filtered[] = $object;
                }
            }
        }

        if (empty($filtered)) {
            return new HtmlResponse($this->template->render('app::home', ['clientes' => $clientes]));
        }

        return new HtmlResponse($this->template->render('app::home', ['clientes' => $filtered]));
    }
}
