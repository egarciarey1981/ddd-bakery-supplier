<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Read;

use App\Bakery\Billing\Application\Service\Supplier\SupplierService;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierDoesNotExistException;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierId;

class ReadSupplierService extends SupplierService
{
    public function execute(ReadSupplierRequest $request)
    {

        $id = $request->id();
        $supplierId = new SupplierId($id);

        $supplier = $this->repository->supplierOfId($supplierId);

        if (is_null($supplier)) {
            throw SupplierDoesNotExistException::fromSupplierId($supplierId);
        }

        return new ReadSupplierResponse($supplier);
    }
}
