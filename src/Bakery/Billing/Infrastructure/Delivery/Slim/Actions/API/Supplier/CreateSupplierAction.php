<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\Create\CreateSupplierRequest;
use App\Bakery\Billing\Application\Service\Supplier\Create\CreateSupplierService;
use Slim\Psr7\Response;

class CreateSupplierAction extends SupplierAction
{
    public function action(): Response
    {
        $params = $this->request->getParsedBody();
        $name = $params['name'] ?? '';
        
        $service = new CreateSupplierService($this->repository);
        $request = new CreateSupplierRequest($name);
        $response = $service->execute($request);
        
        $data = ['supplier' => $response->supplier];
        return $this->respondWithData($data);
    }
}
