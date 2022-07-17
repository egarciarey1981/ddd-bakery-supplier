<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\List\ListSuppliersService;
use Slim\Psr7\Response;

class ListSuppliersAction extends SupplierAction
{
    public function action(): Response
    {
        $service = new ListSuppliersService($this->repository);
        $response = $service->execute();
        
        $data = ['suppliers' => $response->suppliers];
        return $this->respondWithData($data);
    }
}
