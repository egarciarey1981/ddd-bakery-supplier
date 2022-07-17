<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Domain\Model\Supplier;

class Supplier
{
    private SupplierId $id;
    private SupplierName $name;

    public function __construct(
        SupplierId $id,
        SupplierName $name,
    )
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): SupplierId
    {
        return $this->id;
    }
    public function name(): SupplierName
    {
        return $this->name;
    }
}
