<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier;

use App\Bakery\Billing\Domain\Model\Supplier\SupplierRepository;

class SupplierService
{
    protected SupplierRepository $repository;

    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }
}
