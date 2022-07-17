<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Domain\Model\Supplier;

class SupplierId
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function equals(SupplierId $other): bool
    {
        return $this->id === $other->id();
    }
}
