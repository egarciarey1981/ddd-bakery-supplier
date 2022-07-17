<?php

declare(strict_types=1);

use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\CreateSupplierAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ListSuppliersAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ReadSupplierAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ReplaceSupplierAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\UpdateSupplierAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->group('/billing', function (Group $group) {
        $group->group('/api', function (Group $group) {
            $group->group('/suppliers', function (Group $group) {
                $group->get('[/]', ListSuppliersAction::class);
                $group->post('[/]', CreateSupplierAction::class);
                $group->get('/{id}', ReadSupplierAction::class);
                $group->put('/{id}', ReplaceSupplierAction::class);
                $group->patch('/{id}', UpdateSupplierAction::class);
            });
        });
    });
};