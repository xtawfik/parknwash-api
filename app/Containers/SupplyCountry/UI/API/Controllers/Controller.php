<?php

namespace App\Containers\SupplyCountry\UI\API\Controllers;

use App\Containers\SupplyCountry\UI\API\Requests\CreateSupplyCountryRequest;
use App\Containers\SupplyCountry\UI\API\Requests\DeleteSupplyCountryRequest;
use App\Containers\SupplyCountry\UI\API\Requests\GetAllSupplyCountriesRequest;
use App\Containers\SupplyCountry\UI\API\Requests\FindSupplyCountryByIdRequest;
use App\Containers\SupplyCountry\UI\API\Requests\UpdateSupplyCountryRequest;
use App\Containers\SupplyCountry\UI\API\Transformers\SupplyCountryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\SupplyCountry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSupplyCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSupplyCountry(CreateSupplyCountryRequest $request)
    {
        $supplycountry = Apiato::call('SupplyCountry@CreateSupplyCountryAction', [$request]);

        $this->uploadMedia( $supplycountry, "image", true );
        $this->uploadMedia( $supplycountry, "gallery" );
        $this->uploadMedia( $supplycountry, "file" );

        return $this->created($this->transform($supplycountry, SupplyCountryTransformer::class));
    }

    /**
     * @param FindSupplyCountryByIdRequest $request
     * @return array
     */
    public function findSupplyCountryById(FindSupplyCountryByIdRequest $request)
    {
        $supplycountry = Apiato::call('SupplyCountry@FindSupplyCountryByIdAction', [$request]);

        return $this->transform($supplycountry, SupplyCountryTransformer::class);
    }

    /**
     * @param GetAllSupplyCountriesRequest $request
     * @return array
     */
    public function getAllSupplyCountries(GetAllSupplyCountriesRequest $request)
    {
        $supplycountries = Apiato::call('SupplyCountry@GetAllSupplyCountriesAction', [$request]);

        return $this->transform($supplycountries, SupplyCountryTransformer::class);
    }

    /**
     * @param UpdateSupplyCountryRequest $request
     * @return array
     */
    public function updateSupplyCountry(UpdateSupplyCountryRequest $request)
    {
        $supplycountry = Apiato::call('SupplyCountry@UpdateSupplyCountryAction', [$request]);

        $this->uploadMedia( $supplycountry, "image", true );
        $this->uploadMedia( $supplycountry, "gallery" );
        $this->uploadMedia( $supplycountry, "file" );

        return $this->transform($supplycountry, SupplyCountryTransformer::class);
    }

    /**
     * @param DeleteSupplyCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSupplyCountry(DeleteSupplyCountryRequest $request)
    {
        Apiato::call('SupplyCountry@DeleteSupplyCountryAction', [$request]);

        return $this->noContent();
    }
}
