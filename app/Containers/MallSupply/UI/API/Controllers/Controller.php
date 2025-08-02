<?php

namespace App\Containers\MallSupply\UI\API\Controllers;

use App\Containers\MallSupply\UI\API\Requests\CreateMallSupplyRequest;
use App\Containers\MallSupply\UI\API\Requests\DeleteMallSupplyRequest;
use App\Containers\MallSupply\UI\API\Requests\GetAllMallSuppliesRequest;
use App\Containers\MallSupply\UI\API\Requests\FindMallSupplyByIdRequest;
use App\Containers\MallSupply\UI\API\Requests\UpdateMallSupplyRequest;
use App\Containers\MallSupply\UI\API\Transformers\MallSupplyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\MallSupply\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMallSupplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMallSupply(CreateMallSupplyRequest $request)
    {
        $mallsupply = Apiato::call('MallSupply@CreateMallSupplyAction', [$request]);

        $this->uploadMedia( $mallsupply, "image", true );
        $this->uploadMedia( $mallsupply, "gallery" );
        $this->uploadMedia( $mallsupply, "file" );

        return $this->created($this->transform($mallsupply, MallSupplyTransformer::class));
    }

    /**
     * @param FindMallSupplyByIdRequest $request
     * @return array
     */
    public function findMallSupplyById(FindMallSupplyByIdRequest $request)
    {
        $mallsupply = Apiato::call('MallSupply@FindMallSupplyByIdAction', [$request]);

        return $this->transform($mallsupply, MallSupplyTransformer::class);
    }

    /**
     * @param GetAllMallSuppliesRequest $request
     * @return array
     */
    public function getAllMallSupplies(GetAllMallSuppliesRequest $request)
    {
        $mallsupplies = Apiato::call('MallSupply@GetAllMallSuppliesAction', [$request]);

        return $this->transform($mallsupplies, MallSupplyTransformer::class);
    }

    /**
     * @param UpdateMallSupplyRequest $request
     * @return array
     */
    public function updateMallSupply(UpdateMallSupplyRequest $request)
    {
        $mallsupply = Apiato::call('MallSupply@UpdateMallSupplyAction', [$request]);

        $this->uploadMedia( $mallsupply, "image", true );
        $this->uploadMedia( $mallsupply, "gallery" );
        $this->uploadMedia( $mallsupply, "file" );

        return $this->transform($mallsupply, MallSupplyTransformer::class);
    }

    /**
     * @param DeleteMallSupplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMallSupply(DeleteMallSupplyRequest $request)
    {
        Apiato::call('MallSupply@DeleteMallSupplyAction', [$request]);

        return $this->noContent();
    }
}
