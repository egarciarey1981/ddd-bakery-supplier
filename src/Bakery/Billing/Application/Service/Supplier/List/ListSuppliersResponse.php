<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\List;

use App\Bakery\Billing\Application\DataTransformer\SupplierDataTransformer;

class ListSuppliersResponse
{
    public array $suppliers;

    public function __construct(array $suppliers)
    {
        $callable = [SupplierDataTransformer::class, 'toArray'];
        $this->suppliers = array_map($callable, $suppliers);
    }
}
