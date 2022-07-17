<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\Read\ReadSupplierRequest;
use App\Bakery\Billing\Application\Service\Supplier\Read\ReadSupplierService;
use Slim\Psr7\Response;

class ReadSupplierAction extends SupplierAction
{
    public function action(): Response
    {
        $id = $this->args['id'];

        $service = new ReadSupplierService($this->repository);
        $request = new ReadSupplierRequest($id);
        $response = $service->execute($request);

        $data = ['supplier' => $response->supplier];
        return $this->respondWithData($data);
    }
}
