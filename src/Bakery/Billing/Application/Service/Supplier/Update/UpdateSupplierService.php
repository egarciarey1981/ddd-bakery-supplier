<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Update;

use App\Bakery\Billing\Application\Service\Supplier\SupplierService;
use App\Bakery\Billing\Domain\Model\Supplier\Supplier;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierDoesNotExistException;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierId;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierName;

class UpdateSupplierService extends SupplierService
{
    public function execute(UpdateSupplierRequest $replaceSupplierRequest)
    {
        $id = $replaceSupplierRequest->id();
        $supplierId = new SupplierId($id);

        $supplier = $this->repository->supplierOfId($supplierId);

        if (is_null($supplier)) {
            throw SupplierDoesNotExistException::fromSupplierId($supplierId);
        }

        $name = $replaceSupplierRequest->name() ?? $supplier->name()->name();
        $supplierName = new SupplierName($name);

        $supplier = new Supplier(
            $supplierId,
            $supplierName,
        );

        $this->repository->save($supplier);

        return new UpdateSupplierResponse($supplier);
    }
}
