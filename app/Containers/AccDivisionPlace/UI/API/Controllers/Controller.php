<?php

namespace App\Containers\AccDivisionPlace\UI\API\Controllers;

use App\Containers\AccDivisionPlace\UI\API\Requests\CreateAccDivisionPlaceRequest;
use App\Containers\AccDivisionPlace\UI\API\Requests\DeleteAccDivisionPlaceRequest;
use App\Containers\AccDivisionPlace\UI\API\Requests\GetAllAccDivisionPlacesRequest;
use App\Containers\AccDivisionPlace\UI\API\Requests\FindAccDivisionPlaceByIdRequest;
use App\Containers\AccDivisionPlace\UI\API\Requests\UpdateAccDivisionPlaceRequest;
use App\Containers\AccDivisionPlace\UI\API\Transformers\AccDivisionPlaceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccDivisionPlace\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccDivisionPlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccDivisionPlace(CreateAccDivisionPlaceRequest $request)
    {
        $accdivisionplace = Apiato::call('AccDivisionPlace@CreateAccDivisionPlaceAction', [$request]);

        $this->uploadMedia( $accdivisionplace, "image", true );
        $this->uploadMedia( $accdivisionplace, "gallery" );
        $this->uploadMedia( $accdivisionplace, "file" );

        return $this->created($this->transform($accdivisionplace, AccDivisionPlaceTransformer::class));
    }

    /**
     * @param FindAccDivisionPlaceByIdRequest $request
     * @return array
     */
    public function findAccDivisionPlaceById(FindAccDivisionPlaceByIdRequest $request)
    {
        $accdivisionplace = Apiato::call('AccDivisionPlace@FindAccDivisionPlaceByIdAction', [$request]);

        return $this->transform($accdivisionplace, AccDivisionPlaceTransformer::class);
    }

    /**
     * @param GetAllAccDivisionPlacesRequest $request
     * @return array
     */
    public function getAllAccDivisionPlaces(GetAllAccDivisionPlacesRequest $request)
    {
        $accdivisionplaces = Apiato::call('AccDivisionPlace@GetAllAccDivisionPlacesAction', [$request]);

        return $this->transform($accdivisionplaces, AccDivisionPlaceTransformer::class);
    }

    /**
     * @param UpdateAccDivisionPlaceRequest $request
     * @return array
     */
    public function updateAccDivisionPlace(UpdateAccDivisionPlaceRequest $request)
    {
        $accdivisionplace = Apiato::call('AccDivisionPlace@UpdateAccDivisionPlaceAction', [$request]);

        $this->uploadMedia( $accdivisionplace, "image", true );
        $this->uploadMedia( $accdivisionplace, "gallery" );
        $this->uploadMedia( $accdivisionplace, "file" );

        return $this->transform($accdivisionplace, AccDivisionPlaceTransformer::class);
    }

    /**
     * @param DeleteAccDivisionPlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccDivisionPlace(DeleteAccDivisionPlaceRequest $request)
    {
        Apiato::call('AccDivisionPlace@DeleteAccDivisionPlaceAction', [$request]);

        return $this->noContent();
    }
}
