<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\Web\Supplier;


use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ListSuppliersAction
{
    protected Request $request;
    protected Response $response;
    protected array $args;

    public function __construct(\Twig\Environment $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $result = $this->view->render(
            'suppliers/list.twig', [
            'name' => 'magnotta'
    ]);

        $response->getBody()->write($result);

        return $response;
    }
}