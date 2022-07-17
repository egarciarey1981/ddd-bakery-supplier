<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Read;

class ReadSupplierRequest
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
