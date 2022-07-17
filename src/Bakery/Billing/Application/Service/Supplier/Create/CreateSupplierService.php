<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Create;

use App\Bakery\Billing\Application\Service\Supplier\SupplierService;
use App\Bakery\Billing\Domain\Model\Supplier\Supplier;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierName;

class CreateSupplierService extends SupplierService
{
    public function execute(CreateSupplierRequest $createSupplierRequest)
    {
        $name = $createSupplierRequest->name();

        $supplierName = new SupplierName($name);

        $supplier = new Supplier(
            $this->repository->nextIdentity(),
            $supplierName,
        );

        $this->repository->save($supplier);

        return new CreateSupplierResponse($supplier);
    }
}
