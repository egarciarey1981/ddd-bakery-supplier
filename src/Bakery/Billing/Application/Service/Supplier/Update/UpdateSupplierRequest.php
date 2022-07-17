<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Application\Service\Supplier\Update;

class UpdateSupplierRequest
{
    public string $id;
    public ?string $name;

    public function __construct(
        string $id,
        ?string $name,
    )
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
