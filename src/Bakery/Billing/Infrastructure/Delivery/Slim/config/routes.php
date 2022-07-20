<?php

declare(strict_types=1);

use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\CreateSupplierAction as CreateSupplierApiAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ListSuppliersAction as ListSuppliersApiAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ReadSupplierAction as ReadSupplierApiAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\ReplaceSupplierAction as ReplaceSupplierApiAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\API\Supplier\UpdateSupplierAction as UpdateSupplierApiAction;
use App\Bakery\Billing\Infrastructure\Delivery\Slim\Actions\Web\Supplier\ListSuppliersAction as SupplierListSuppliersWebAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->redirect('[/]', '/bakery/billing/suppliers', 301);
    $app->group('/bakery', function (Group $group) {
        $group->group('/billing', function (Group $group) {
            $group->group('/api', function (Group $group) {
                $group->group('/suppliers', function (Group $group) {
                    $group->get('[/]', ListSuppliersApiAction::class);
                    $group->post('[/]', CreateSupplierApiAction::class);
                    $group->get('/{id}', ReadSupplierApiAction::class);
                    $group->put('/{id}', ReplaceSupplierApiAction::class);
                    $group->patch('/{id}', UpdateSupplierApiAction::class);
                });
            });
            $group->group('/suppliers', function (Group $group) {
                $group->get('[/]', SupplierListSuppliersWebAction::class);
            });            
        });
    });
};
