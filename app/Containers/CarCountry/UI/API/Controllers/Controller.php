<?php

namespace App\Containers\CarCountry\UI\API\Controllers;

use App\Containers\CarCountry\UI\API\Requests\CreateCarModelRequest;
use App\Containers\CarCountry\UI\API\Requests\DeleteCarModelRequest;
use App\Containers\CarCountry\UI\API\Requests\GetAllCarModelsRequest;
use App\Containers\CarCountry\UI\API\Requests\FindCarModelByIdRequest;
use App\Containers\CarCountry\UI\API\Requests\UpdateCarModelRequest;
use App\Containers\CarCountry\UI\API\Transformers\CarModelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CarCountry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCarModelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCarCountry(CreateCarModelRequest $request)
    {
        $carcountry = Apiato::call('CarCountry@CreateCarModelAction', [$request]);

        $this->uploadMedia( $carcountry, "image", true );
        $this->uploadMedia( $carcountry, "gallery" );
        $this->uploadMedia( $carcountry, "file" );

        return $this->created($this->transform($carcountry, CarModelTransformer::class));
    }

    /**
     * @param FindCarModelByIdRequest $request
     * @return array
     */
    public function findCarCountryById(FindCarModelByIdRequest $request)
    {
        $carcountry = Apiato::call('CarCountry@FindCarModelByIdAction', [$request]);

        return $this->transform($carcountry, CarModelTransformer::class);
    }

    /**
     * @param GetAllCarModelsRequest $request
     * @return array
     */
    public function getAllCarCountries(GetAllCarModelsRequest $request)
    {
        $carcountries = Apiato::call('CarCountry@GetAllCarModelsAction', [$request]);

        return $this->transform($carcountries, CarModelTransformer::class);
    }

    /**
     * @param UpdateCarModelRequest $request
     * @return array
     */
    public function updateCarCountry(UpdateCarModelRequest $request)
    {
        $carcountry = Apiato::call('CarCountry@UpdateCarModelAction', [$request]);

        $this->uploadMedia( $carcountry, "image", true );
        $this->uploadMedia( $carcountry, "gallery" );
        $this->uploadMedia( $carcountry, "file" );

        return $this->transform($carcountry, CarModelTransformer::class);
    }

    /**
     * @param DeleteCarModelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCarCountry(DeleteCarModelRequest $request)
    {
        Apiato::call('CarCountry@DeleteCarModelAction', [$request]);

        return $this->noContent();
    }
}
