<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Domain\Model\Supplier;

use App\Bakery\Billing\Domain\Exception\DoesNotExistException;

class SupplierDoesNotExistException extends DoesNotExistException
{
    public function __contruct(string $message)
    {
        $this->message = $message;
    }

    static public function fromSupplierId(SupplierId $id)
    {
        return new self("A supplier with an ID of {$id->id()} not exist");
    }
}
