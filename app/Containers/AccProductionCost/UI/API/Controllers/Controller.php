<?php

namespace App\Containers\AccProductionCost\UI\API\Controllers;

use App\Containers\AccProductionCost\UI\API\Requests\CreateAccProductionCostRequest;
use App\Containers\AccProductionCost\UI\API\Requests\DeleteAccProductionCostRequest;
use App\Containers\AccProductionCost\UI\API\Requests\GetAllAccProductionCostsRequest;
use App\Containers\AccProductionCost\UI\API\Requests\FindAccProductionCostByIdRequest;
use App\Containers\AccProductionCost\UI\API\Requests\UpdateAccProductionCostRequest;
use App\Containers\AccProductionCost\UI\API\Transformers\AccProductionCostTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccProductionCost\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccProductionCostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccProductionCost(CreateAccProductionCostRequest $request)
    {
        $accproductioncost = Apiato::call('AccProductionCost@CreateAccProductionCostAction', [$request]);

        $this->uploadMedia( $accproductioncost, "image", true );
        $this->uploadMedia( $accproductioncost, "gallery" );
        $this->uploadMedia( $accproductioncost, "file" );

        return $this->created($this->transform($accproductioncost, AccProductionCostTransformer::class));
    }

    /**
     * @param FindAccProductionCostByIdRequest $request
     * @return array
     */
    public function findAccProductionCostById(FindAccProductionCostByIdRequest $request)
    {
        $accproductioncost = Apiato::call('AccProductionCost@FindAccProductionCostByIdAction', [$request]);

        return $this->transform($accproductioncost, AccProductionCostTransformer::class);
    }

    /**
     * @param GetAllAccProductionCostsRequest $request
     * @return array
     */
    public function getAllAccProductionCosts(GetAllAccProductionCostsRequest $request)
    {
        $accproductioncosts = Apiato::call('AccProductionCost@GetAllAccProductionCostsAction', [$request]);

        return $this->transform($accproductioncosts, AccProductionCostTransformer::class);
    }

    /**
     * @param UpdateAccProductionCostRequest $request
     * @return array
     */
    public function updateAccProductionCost(UpdateAccProductionCostRequest $request)
    {
        $accproductioncost = Apiato::call('AccProductionCost@UpdateAccProductionCostAction', [$request]);

        $this->uploadMedia( $accproductioncost, "image", true );
        $this->uploadMedia( $accproductioncost, "gallery" );
        $this->uploadMedia( $accproductioncost, "file" );

        return $this->transform($accproductioncost, AccProductionCostTransformer::class);
    }

    /**
     * @param DeleteAccProductionCostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccProductionCost(DeleteAccProductionCostRequest $request)
    {
        Apiato::call('AccProductionCost@DeleteAccProductionCostAction', [$request]);

        return $this->noContent();
    }
}
