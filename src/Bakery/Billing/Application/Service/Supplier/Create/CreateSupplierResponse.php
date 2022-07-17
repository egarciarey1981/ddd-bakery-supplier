<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Create;

use App\Bakery\Billing\Application\DataTransformer\SupplierDataTransformer;
use App\Bakery\Billing\Domain\Model\Supplier\Supplier;

class CreateSupplierResponse
{
    public array $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = SupplierDataTransformer::toArray($supplier);
    }
}
