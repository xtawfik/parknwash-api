<?php

namespace App\Containers\Supply\UI\API\Controllers;

use App\Containers\Supply\UI\API\Requests\CreateSupplyRequest;
use App\Containers\Supply\UI\API\Requests\DeleteSupplyRequest;
use App\Containers\Supply\UI\API\Requests\GetAllSuppliesRequest;
use App\Containers\Supply\UI\API\Requests\FindSupplyByIdRequest;
use App\Containers\Supply\UI\API\Requests\UpdateSupplyRequest;
use App\Containers\Supply\UI\API\Transformers\SupplyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Supply\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSupplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSupply(CreateSupplyRequest $request)
    {
        $supply = Apiato::call('Supply@CreateSupplyAction', [$request]);

        $this->uploadMedia( $supply, "image", true );
        $this->uploadMedia( $supply, "gallery" );
        $this->uploadMedia( $supply, "file" );

        return $this->created($this->transform($supply, SupplyTransformer::class));
    }

    /**
     * @param FindSupplyByIdRequest $request
     * @return array
     */
    public function findSupplyById(FindSupplyByIdRequest $request)
    {
        $supply = Apiato::call('Supply@FindSupplyByIdAction', [$request]);

        return $this->transform($supply, SupplyTransformer::class);
    }

    /**
     * @param GetAllSuppliesRequest $request
     * @return array
     */
    public function getAllSupplies(GetAllSuppliesRequest $request)
    {
        $supplies = Apiato::call('Supply@GetAllSuppliesAction', [$request]);

        return $this->transform($supplies, SupplyTransformer::class);
    }

    /**
     * @param UpdateSupplyRequest $request
     * @return array
     */
    public function updateSupply(UpdateSupplyRequest $request)
    {
        $supply = Apiato::call('Supply@UpdateSupplyAction', [$request]);

        $this->uploadMedia( $supply, "image", true );
        $this->uploadMedia( $supply, "gallery" );
        $this->uploadMedia( $supply, "file" );

        return $this->transform($supply, SupplyTransformer::class);
    }

    /**
     * @param DeleteSupplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSupply(DeleteSupplyRequest $request)
    {
        Apiato::call('Supply@DeleteSupplyAction', [$request]);

        return $this->noContent();
    }
}
