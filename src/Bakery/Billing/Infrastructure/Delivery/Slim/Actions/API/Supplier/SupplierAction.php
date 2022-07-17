<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Domain\Model\Supplier\SupplierRepository;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\Action;

abstract class SupplierAction extends Action
{
    protected SupplierRepository $repository;

    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }
}
