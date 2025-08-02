<?php

namespace App\Containers\AccProductionOrder\UI\API\Controllers;

use App\Containers\AccProductionOrder\UI\API\Requests\CreateAccProductionOrderRequest;
use App\Containers\AccProductionOrder\UI\API\Requests\DeleteAccProductionOrderRequest;
use App\Containers\AccProductionOrder\UI\API\Requests\GetAllAccProductionOrdersRequest;
use App\Containers\AccProductionOrder\UI\API\Requests\FindAccProductionOrderByIdRequest;
use App\Containers\AccProductionOrder\UI\API\Requests\UpdateAccProductionOrderRequest;
use App\Containers\AccProductionOrder\UI\API\Transformers\AccProductionOrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccProductionOrder\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccProductionOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccProductionOrder(CreateAccProductionOrderRequest $request)
    {
        $accproductionorder = Apiato::call('AccProductionOrder@CreateAccProductionOrderAction', [$request]);

        $this->uploadMedia( $accproductionorder, "image", true );
        $this->uploadMedia( $accproductionorder, "gallery" );
        $this->uploadMedia( $accproductionorder, "file" );

        return $this->created($this->transform($accproductionorder, AccProductionOrderTransformer::class));
    }

    /**
     * @param FindAccProductionOrderByIdRequest $request
     * @return array
     */
    public function findAccProductionOrderById(FindAccProductionOrderByIdRequest $request)
    {
        $accproductionorder = Apiato::call('AccProductionOrder@FindAccProductionOrderByIdAction', [$request]);

        return $this->transform($accproductionorder, AccProductionOrderTransformer::class);
    }

    /**
     * @param GetAllAccProductionOrdersRequest $request
     * @return array
     */
    public function getAllAccProductionOrders(GetAllAccProductionOrdersRequest $request)
    {
        $accproductionorders = Apiato::call('AccProductionOrder@GetAllAccProductionOrdersAction', [$request]);

        return $this->transform($accproductionorders, AccProductionOrderTransformer::class);
    }

    /**
     * @param UpdateAccProductionOrderRequest $request
     * @return array
     */
    public function updateAccProductionOrder(UpdateAccProductionOrderRequest $request)
    {
        $accproductionorder = Apiato::call('AccProductionOrder@UpdateAccProductionOrderAction', [$request]);

        $this->uploadMedia( $accproductionorder, "image", true );
        $this->uploadMedia( $accproductionorder, "gallery" );
        $this->uploadMedia( $accproductionorder, "file" );

        return $this->transform($accproductionorder, AccProductionOrderTransformer::class);
    }

    /**
     * @param DeleteAccProductionOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccProductionOrder(DeleteAccProductionOrderRequest $request)
    {
        Apiato::call('AccProductionOrder@DeleteAccProductionOrderAction', [$request]);

        return $this->noContent();
    }
}
