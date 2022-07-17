<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\DataTransformer;

use App\Bakery\Billing\Domain\Model\Supplier\Supplier;

class SupplierDataTransformer
{
    static public function toArray(Supplier $supplier): array
    {
        return [
            'id' => $supplier->id()->id(),
            'name' => $supplier->name()->name(),
        ];
    }
}
