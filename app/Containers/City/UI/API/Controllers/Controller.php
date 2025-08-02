<?php

namespace App\Containers\City\UI\API\Controllers;

use App\Containers\City\UI\API\Requests\CreateCityRequest;
use App\Containers\City\UI\API\Requests\DeleteCityRequest;
use App\Containers\City\UI\API\Requests\GetAllCitiesRequest;
use App\Containers\City\UI\API\Requests\FindCityByIdRequest;
use App\Containers\City\UI\API\Requests\UpdateCityRequest;
use App\Containers\City\UI\API\Transformers\CityTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\City\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCity(CreateCityRequest $request)
    {
        $city = Apiato::call('City@CreateCityAction', [$request]);

        $this->uploadMedia( $city, "image", true );
        $this->uploadMedia( $city, "gallery" );
        $this->uploadMedia( $city, "file" );

        return $this->created($this->transform($city, CityTransformer::class));
    }

    /**
     * @param FindCityByIdRequest $request
     * @return array
     */
    public function findCityById(FindCityByIdRequest $request)
    {
        $city = Apiato::call('City@FindCityByIdAction', [$request]);

        return $this->transform($city, CityTransformer::class);
    }

    /**
     * @param GetAllCitiesRequest $request
     * @return array
     */
    public function getAllCities(GetAllCitiesRequest $request)
    {
        $cities = Apiato::call('City@GetAllCitiesAction', [$request]);

        return $this->transform($cities, CityTransformer::class);
    }

    /**
     * @param UpdateCityRequest $request
     * @return array
     */
    public function updateCity(UpdateCityRequest $request)
    {
        $city = Apiato::call('City@UpdateCityAction', [$request]);

        $this->uploadMedia( $city, "image", true );
        $this->uploadMedia( $city, "gallery" );
        $this->uploadMedia( $city, "file" );

        return $this->transform($city, CityTransformer::class);
    }

    /**
     * @param DeleteCityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCity(DeleteCityRequest $request)
    {
        Apiato::call('City@DeleteCityAction', [$request]);

        return $this->noContent();
    }
}
