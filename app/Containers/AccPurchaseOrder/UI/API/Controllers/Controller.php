<?php

namespace App\Containers\AccPurchaseOrder\UI\API\Controllers;

use App\Containers\AccPurchaseOrder\UI\API\Requests\CreateAccPurchaseOrderRequest;
use App\Containers\AccPurchaseOrder\UI\API\Requests\DeleteAccPurchaseOrderRequest;
use App\Containers\AccPurchaseOrder\UI\API\Requests\GetAllAccPurchaseOrdersRequest;
use App\Containers\AccPurchaseOrder\UI\API\Requests\FindAccPurchaseOrderByIdRequest;
use App\Containers\AccPurchaseOrder\UI\API\Requests\UpdateAccPurchaseOrderRequest;
use App\Containers\AccPurchaseOrder\UI\API\Transformers\AccPurchaseOrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPurchaseOrder\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPurchaseOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPurchaseOrder(CreateAccPurchaseOrderRequest $request)
    {
        $accpurchaseorder = Apiato::call('AccPurchaseOrder@CreateAccPurchaseOrderAction', [$request]);

        $this->uploadMedia( $accpurchaseorder, "image", true );
        $this->uploadMedia( $accpurchaseorder, "gallery" );
        $this->uploadMedia( $accpurchaseorder, "file" );

        return $this->created($this->transform($accpurchaseorder, AccPurchaseOrderTransformer::class));
    }

    /**
     * @param FindAccPurchaseOrderByIdRequest $request
     * @return array
     */
    public function findAccPurchaseOrderById(FindAccPurchaseOrderByIdRequest $request)
    {
        $accpurchaseorder = Apiato::call('AccPurchaseOrder@FindAccPurchaseOrderByIdAction', [$request]);

        return $this->transform($accpurchaseorder, AccPurchaseOrderTransformer::class);
    }

    /**
     * @param GetAllAccPurchaseOrdersRequest $request
     * @return array
     */
    public function getAllAccPurchaseOrders(GetAllAccPurchaseOrdersRequest $request)
    {
        $accpurchaseorders = Apiato::call('AccPurchaseOrder@GetAllAccPurchaseOrdersAction', [$request]);

        return $this->transform($accpurchaseorders, AccPurchaseOrderTransformer::class);
    }

    /**
     * @param UpdateAccPurchaseOrderRequest $request
     * @return array
     */
    public function updateAccPurchaseOrder(UpdateAccPurchaseOrderRequest $request)
    {
        $accpurchaseorder = Apiato::call('AccPurchaseOrder@UpdateAccPurchaseOrderAction', [$request]);

        $this->uploadMedia( $accpurchaseorder, "image", true );
        $this->uploadMedia( $accpurchaseorder, "gallery" );
        $this->uploadMedia( $accpurchaseorder, "file" );

        return $this->transform($accpurchaseorder, AccPurchaseOrderTransformer::class);
    }

    /**
     * @param DeleteAccPurchaseOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPurchaseOrder(DeleteAccPurchaseOrderRequest $request)
    {
        Apiato::call('AccPurchaseOrder@DeleteAccPurchaseOrderAction', [$request]);

        return $this->noContent();
    }
}
