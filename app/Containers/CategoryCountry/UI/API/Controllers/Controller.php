<?php

namespace App\Containers\CategoryCountry\UI\API\Controllers;

use App\Containers\CategoryCountry\UI\API\Requests\CreateCategoryCountryRequest;
use App\Containers\CategoryCountry\UI\API\Requests\DeleteCategoryCountryRequest;
use App\Containers\CategoryCountry\UI\API\Requests\GetAllCategoryCountriesRequest;
use App\Containers\CategoryCountry\UI\API\Requests\FindCategoryCountryByIdRequest;
use App\Containers\CategoryCountry\UI\API\Requests\UpdateCategoryCountryRequest;
use App\Containers\CategoryCountry\UI\API\Transformers\CategoryCountryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CategoryCountry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCategoryCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCategoryCountry(CreateCategoryCountryRequest $request)
    {
        $categorycountry = Apiato::call('CategoryCountry@CreateCategoryCountryAction', [$request]);

        $this->uploadMedia( $categorycountry, "image", true );
        $this->uploadMedia( $categorycountry, "gallery" );
        $this->uploadMedia( $categorycountry, "file" );

        return $this->created($this->transform($categorycountry, CategoryCountryTransformer::class));
    }

    /**
     * @param FindCategoryCountryByIdRequest $request
     * @return array
     */
    public function findCategoryCountryById(FindCategoryCountryByIdRequest $request)
    {
        $categorycountry = Apiato::call('CategoryCountry@FindCategoryCountryByIdAction', [$request]);

        return $this->transform($categorycountry, CategoryCountryTransformer::class);
    }

    /**
     * @param GetAllCategoryCountriesRequest $request
     * @return array
     */
    public function getAllCategoryCountries(GetAllCategoryCountriesRequest $request)
    {
        $categorycountries = Apiato::call('CategoryCountry@GetAllCategoryCountriesAction', [$request]);

        return $this->transform($categorycountries, CategoryCountryTransformer::class);
    }

    /**
     * @param UpdateCategoryCountryRequest $request
     * @return array
     */
    public function updateCategoryCountry(UpdateCategoryCountryRequest $request)
    {
        $categorycountry = Apiato::call('CategoryCountry@UpdateCategoryCountryAction', [$request]);

        $this->uploadMedia( $categorycountry, "image", true );
        $this->uploadMedia( $categorycountry, "gallery" );
        $this->uploadMedia( $categorycountry, "file" );

        return $this->transform($categorycountry, CategoryCountryTransformer::class);
    }

    /**
     * @param DeleteCategoryCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategoryCountry(DeleteCategoryCountryRequest $request)
    {
        Apiato::call('CategoryCountry@DeleteCategoryCountryAction', [$request]);

        return $this->noContent();
    }
}
