<?php

declare(strict_types=1);

namespace App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions;

use App\Bakery\Billing\Domain\Exception\DoesNotExistException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Throwable;

abstract class Action
{
    protected Request $request;
    protected Response $response;
    protected array $args;

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        try {
            return $this->action();
        } catch (Throwable $e) {
            return $this->respondWithError($e);
        }
    }

    abstract protected function action(): Response;

    protected function respondWithData(array $data, int $statusCode = 200): Response
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);

        $this->response->getBody()->write($json);

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }

    protected function respondWithError(Throwable $e): Response
    {
        $message = 'An unexpected error occurred';
        $statusCode = 500;

        if (is_a($e, DoesNotExistException::class)) {
            $message = $e->getMessage();
            $statusCode = 404;
        } else {
            $message = $e->getMessage();
        }

        $data = ['errors' => $message];

        return $this->respondWithData($data, $statusCode);
    }
}
