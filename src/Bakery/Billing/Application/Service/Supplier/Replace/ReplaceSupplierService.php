<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Replace;

use App\Bakery\Billing\Application\Service\Supplier\SupplierService;
use App\Bakery\Billing\Domain\Model\Supplier\Supplier;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierDoesNotExistException;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierId;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierName;

class ReplaceSupplierService extends SupplierService
{
    public function execute(ReplaceSupplierRequest $replaceSupplierRequest)
    {
        $id = $replaceSupplierRequest->id();
        $supplierId = new SupplierId($id);

        $supplier = $this->repository->supplierOfId($supplierId);

        if (is_null($supplier)) {
            throw SupplierDoesNotExistException::fromSupplierId($supplierId);
        }

        $name = $replaceSupplierRequest->name();
        $supplierName = new SupplierName($name);

        $supplier = new Supplier(
            $supplierId,
            $supplierName,
        );

        $this->repository->save($supplier);

        return new ReplaceSupplierResponse($supplier);
    }
}
