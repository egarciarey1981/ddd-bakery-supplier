<?php

declare(strict_types=1);

use App\Bakery\Billing\Domain\Model\Supplier\SupplierRepository;
use App\Bakery\Billing\Infrastructure\Persistence\InMemory\InMemorySupplierRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        SupplierRepository::class => \DI\autowire(InMemorySupplierRepository::class),
    ]);
};