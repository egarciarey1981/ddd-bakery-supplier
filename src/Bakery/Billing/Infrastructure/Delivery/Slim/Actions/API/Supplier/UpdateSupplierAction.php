<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\Update\UpdateSupplierRequest;
use App\Bakery\Billing\Application\Service\Supplier\Update\UpdateSupplierService;
use Slim\Psr7\Response;

class UpdateSupplierAction extends SupplierAction
{
    public function action(): Response
    {
        $id = $this->args['id'];

        parse_str(file_get_contents("php://input"), $params);
        $name = $params['name'] ?? null;

        $service = new UpdateSupplierService($this->repository);
        $request = new UpdateSupplierRequest($id, $name);
        $response = $service->execute($request);

        $data = ['supplier' => $response->supplier];
        return $this->respondWithData($data);
    }
}
