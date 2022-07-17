<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Domain\Model\Supplier;

use InvalidArgumentException;

class SupplierName
{
    private const MIN_LEN = 3;
    private const MAX_LEN = 30;
    private string $name;

    public function __construct(string $name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Empty name');
        } elseif (strlen($name) < self::MIN_LEN) {
            throw new InvalidArgumentException('Name too sort');
        } elseif (strlen($name) > self::MAX_LEN) {
            throw new InvalidArgumentException('Name too long');
        }

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
