<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TemplateFactory
{
    public function __invoke(ContainerInterface $container, string $className) : RequestHandlerInterface
    {
        return new $className($container->get(TemplateRendererInterface::class));
    }
}
