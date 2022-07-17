<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Create;

class CreateSupplierRequest
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
