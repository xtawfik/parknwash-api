<?php

namespace App\Containers\Warehouse\UI\API\Controllers;

use App\Containers\Warehouse\UI\API\Requests\CreateWarehouseRequest;
use App\Containers\Warehouse\UI\API\Requests\DeleteWarehouseRequest;
use App\Containers\Warehouse\UI\API\Requests\GetAllWarehousesRequest;
use App\Containers\Warehouse\UI\API\Requests\FindWarehouseByIdRequest;
use App\Containers\Warehouse\UI\API\Requests\UpdateWarehouseRequest;
use App\Containers\Warehouse\UI\API\Transformers\WarehouseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Warehouse\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateWarehouseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWarehouse(CreateWarehouseRequest $request)
    {
        $warehouse = Apiato::call('Warehouse@CreateWarehouseAction', [$request]);

        $this->uploadMedia( $warehouse, "image", true );
        $this->uploadMedia( $warehouse, "gallery" );
        $this->uploadMedia( $warehouse, "file" );

        return $this->created($this->transform($warehouse, WarehouseTransformer::class));
    }

    /**
     * @param FindWarehouseByIdRequest $request
     * @return array
     */
    public function findWarehouseById(FindWarehouseByIdRequest $request)
    {
        $warehouse = Apiato::call('Warehouse@FindWarehouseByIdAction', [$request]);

        return $this->transform($warehouse, WarehouseTransformer::class);
    }

    /**
     * @param GetAllWarehousesRequest $request
     * @return array
     */
    public function getAllWarehouses(GetAllWarehousesRequest $request)
    {
        $warehouses = Apiato::call('Warehouse@GetAllWarehousesAction', [$request]);

        return $this->transform($warehouses, WarehouseTransformer::class);
    }

    /**
     * @param UpdateWarehouseRequest $request
     * @return array
     */
    public function updateWarehouse(UpdateWarehouseRequest $request)
    {
        $warehouse = Apiato::call('Warehouse@UpdateWarehouseAction', [$request]);

        $this->uploadMedia( $warehouse, "image", true );
        $this->uploadMedia( $warehouse, "gallery" );
        $this->uploadMedia( $warehouse, "file" );

        return $this->transform($warehouse, WarehouseTransformer::class);
    }

    /**
     * @param DeleteWarehouseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWarehouse(DeleteWarehouseRequest $request)
    {
        Apiato::call('Warehouse@DeleteWarehouseAction', [$request]);

        return $this->noContent();
    }
}
