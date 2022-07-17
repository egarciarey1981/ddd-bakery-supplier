<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\Replace\ReplaceSupplierRequest;
use App\Bakery\Billing\Application\Service\Supplier\Replace\ReplaceSupplierService;
use Slim\Psr7\Response;

class ReplaceSupplierAction extends SupplierAction
{
    public function action(): Response
    {
        $id = $this->args['id'];

        parse_str(file_get_contents("php://input"), $params);
        $name = $params['name'];

        $service = new ReplaceSupplierService($this->repository);
        $request = new ReplaceSupplierRequest($id, $name);
        $response = $service->execute($request);

        $data = ['supplier' => $response->supplier];
        return $this->respondWithData($data);
    }
}
