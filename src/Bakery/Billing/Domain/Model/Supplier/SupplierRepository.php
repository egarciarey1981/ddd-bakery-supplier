<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Domain\Model\Supplier;

interface SupplierRepository
{
    public function all();
    public function supplierOfId(SupplierId $id);
    public function save(Supplier $supplier);
    public function nextIdentity();
}
