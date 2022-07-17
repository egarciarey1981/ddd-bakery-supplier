<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\List;

use App\Bakery\Billing\Application\Service\Supplier\SupplierService;

class ListSuppliersService extends SupplierService
{
    public function execute()
    {
        $supplier = $this->repository->all();
        return new ListSuppliersResponse($supplier);
    }
}
