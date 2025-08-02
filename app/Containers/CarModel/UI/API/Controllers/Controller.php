<?php

namespace App\Containers\CarModel\UI\API\Controllers;

use App\Containers\CarModel\UI\API\Requests\CreateCarModelRequest;
use App\Containers\CarModel\UI\API\Requests\DeleteCarModelRequest;
use App\Containers\CarModel\UI\API\Requests\GetAllCarModelsRequest;
use App\Containers\CarModel\UI\API\Requests\FindCarModelByIdRequest;
use App\Containers\CarModel\UI\API\Requests\UpdateCarModelRequest;
use App\Containers\CarModel\UI\API\Transformers\CarModelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CarModel\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCarModelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCarModel(CreateCarModelRequest $request)
    {
        $carmodel = Apiato::call('CarModel@CreateCarModelAction', [$request]);

        $this->uploadMedia( $carmodel, "image", true );
        $this->uploadMedia( $carmodel, "gallery" );
        $this->uploadMedia( $carmodel, "file" );

        return $this->created($this->transform($carmodel, CarModelTransformer::class));
    }

    /**
     * @param FindCarModelByIdRequest $request
     * @return array
     */
    public function findCarModelById(FindCarModelByIdRequest $request)
    {
        $carmodel = Apiato::call('CarModel@FindCarModelByIdAction', [$request]);

        return $this->transform($carmodel, CarModelTransformer::class);
    }

    /**
     * @param GetAllCarModelsRequest $request
     * @return array
     */
    public function getAllCarModels(GetAllCarModelsRequest $request)
    {
        $carmodels = Apiato::call('CarModel@GetAllCarModelsAction', [$request]);

        return $this->transform($carmodels, CarModelTransformer::class);
    }

    /**
     * @param UpdateCarModelRequest $request
     * @return array
     */
    public function updateCarModel(UpdateCarModelRequest $request)
    {
        $carmodel = Apiato::call('CarModel@UpdateCarModelAction', [$request]);

        $this->uploadMedia( $carmodel, "image", true );
        $this->uploadMedia( $carmodel, "gallery" );
        $this->uploadMedia( $carmodel, "file" );

        return $this->transform($carmodel, CarModelTransformer::class);
    }

    /**
     * @param DeleteCarModelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCarModel(DeleteCarModelRequest $request)
    {
        Apiato::call('CarModel@DeleteCarModelAction', [$request]);

        return $this->noContent();
    }
}
