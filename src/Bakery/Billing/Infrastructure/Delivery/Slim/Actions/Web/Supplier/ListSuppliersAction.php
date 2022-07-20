<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\Web\Supplier;

use App\Bakery\Billing\Application\Service\Supplier\List\ListSuppliersService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ListSuppliersAction
{
    protected Request $request;
    protected Response $response;
    protected array $args;
    protected ListSuppliersService $service;

    public function __construct(\Twig\Environment $view, ListSuppliersService $service)
    {
        $this->view = $view;
        $this->service = $service;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $responseService = $this->service->execute();

        $result = $this->view->render(
            'suppliers/list.twig',
            [
                'suppliers' => $responseService->suppliers
            ]
        );

        $response->getBody()->write($result);

        return $response;
    }
}
