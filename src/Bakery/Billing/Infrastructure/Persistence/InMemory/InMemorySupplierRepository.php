<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Persistence\InMemory;

use App\Bakery\Billing\Domain\Model\Supplier\SuplierDoesNotExistException;
use App\Bakery\Billing\Domain\Model\Supplier\Supplier;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierId;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierName;
use App\Bakery\Billing\Domain\Model\Supplier\SupplierRepository;

class InMemorySupplierRepository implements SupplierRepository
{
    private array $suppliers;

    public function __construct(array $suppliers = null)
    {
        $this->suppliers = $suppliers ?? [
            new Supplier(
                new SupplierId('c19b4ec6-52b2-4549-8284-2e23a5c8021c'),
                new SupplierName('Coca-Cola')
            ),
            new Supplier(
                new SupplierId('b1ad19cb-a096-4aa2-9b53-2e07511e0044'),
                new SupplierName('Heinz')
            ),
            new Supplier(
                new SupplierId('a8bd2f5d-deda-4386-ae33-539e7d55b5a6'),
                new SupplierName('Nestle')
            ),
            new Supplier(
                new SupplierId('99e70e07-7871-476d-b1d9-ed423a3b415a'),
                new SupplierName('Nescafe')
            ),
            new Supplier(
                new SupplierId('4642ad7b-19eb-49ee-abdd-ec8a3ea9a16d'),
                new SupplierName('McCain')
            ),
        ];
    }

    public function all()
    {
        return $this->suppliers;
    }

    public function supplierOfId(SupplierId $id)
    {
        foreach ($this->suppliers as $supplier) {
            if ($id->equals($supplier->id())) {
                return $supplier;
            }
        }

        return null;
    }

    public function nextIdentity(): SupplierId
    {
        return new SupplierId(uniqid());
    }

    public function save(Supplier $supplir): void
    {
    }
}
