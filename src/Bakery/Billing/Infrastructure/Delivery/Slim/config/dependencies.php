<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        \Twig\Environment::class => function (ContainerInterface $c) {
            $loader = new \Twig\Loader\FilesystemLoader('../templates');

            return new \Twig\Environment($loader, [
                //__DIR__ . '/../var/cache'
            ]);
        },
    ]);
};