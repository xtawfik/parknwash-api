<?php

namespace App\Containers\AccSalesOrder\UI\API\Controllers;

use App\Containers\AccSalesOrder\UI\API\Requests\CreateAccSalesOrderRequest;
use App\Containers\AccSalesOrder\UI\API\Requests\DeleteAccSalesOrderRequest;
use App\Containers\AccSalesOrder\UI\API\Requests\GetAllAccSalesOrdersRequest;
use App\Containers\AccSalesOrder\UI\API\Requests\FindAccSalesOrderByIdRequest;
use App\Containers\AccSalesOrder\UI\API\Requests\UpdateAccSalesOrderRequest;
use App\Containers\AccSalesOrder\UI\API\Transformers\AccSalesOrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccSalesOrder\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccSalesOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccSalesOrder(CreateAccSalesOrderRequest $request)
    {
        $accsalesorder = Apiato::call('AccSalesOrder@CreateAccSalesOrderAction', [$request]);

        $this->uploadMedia( $accsalesorder, "image", true );
        $this->uploadMedia( $accsalesorder, "gallery" );
        $this->uploadMedia( $accsalesorder, "file" );

        return $this->created($this->transform($accsalesorder, AccSalesOrderTransformer::class));
    }

    /**
     * @param FindAccSalesOrderByIdRequest $request
     * @return array
     */
    public function findAccSalesOrderById(FindAccSalesOrderByIdRequest $request)
    {
        $accsalesorder = Apiato::call('AccSalesOrder@FindAccSalesOrderByIdAction', [$request]);

        return $this->transform($accsalesorder, AccSalesOrderTransformer::class);
    }

    /**
     * @param GetAllAccSalesOrdersRequest $request
     * @return array
     */
    public function getAllAccSalesOrders(GetAllAccSalesOrdersRequest $request)
    {
        $accsalesorders = Apiato::call('AccSalesOrder@GetAllAccSalesOrdersAction', [$request]);

        return $this->transform($accsalesorders, AccSalesOrderTransformer::class);
    }

    /**
     * @param UpdateAccSalesOrderRequest $request
     * @return array
     */
    public function updateAccSalesOrder(UpdateAccSalesOrderRequest $request)
    {
        $accsalesorder = Apiato::call('AccSalesOrder@UpdateAccSalesOrderAction', [$request]);

        $this->uploadMedia( $accsalesorder, "image", true );
        $this->uploadMedia( $accsalesorder, "gallery" );
        $this->uploadMedia( $accsalesorder, "file" );

        return $this->transform($accsalesorder, AccSalesOrderTransformer::class);
    }

    /**
     * @param DeleteAccSalesOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccSalesOrder(DeleteAccSalesOrderRequest $request)
    {
        Apiato::call('AccSalesOrder@DeleteAccSalesOrderAction', [$request]);

        return $this->noContent();
    }
}
