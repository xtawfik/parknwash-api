<?php

namespace App\Containers\AccPlace\UI\API\Controllers;

use App\Containers\AccPlace\UI\API\Requests\CreateAccPlaceRequest;
use App\Containers\AccPlace\UI\API\Requests\DeleteAccPlaceRequest;
use App\Containers\AccPlace\UI\API\Requests\GetAllAccPlacesRequest;
use App\Containers\AccPlace\UI\API\Requests\FindAccPlaceByIdRequest;
use App\Containers\AccPlace\UI\API\Requests\UpdateAccPlaceRequest;
use App\Containers\AccPlace\UI\API\Transformers\AccPlaceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPlace\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPlace(CreateAccPlaceRequest $request)
    {
        $accplace = Apiato::call('AccPlace@CreateAccPlaceAction', [$request]);

        $this->uploadMedia( $accplace, "image", true );
        $this->uploadMedia( $accplace, "gallery" );
        $this->uploadMedia( $accplace, "file" );

        return $this->created($this->transform($accplace, AccPlaceTransformer::class));
    }

    /**
     * @param FindAccPlaceByIdRequest $request
     * @return array
     */
    public function findAccPlaceById(FindAccPlaceByIdRequest $request)
    {
        $accplace = Apiato::call('AccPlace@FindAccPlaceByIdAction', [$request]);

        return $this->transform($accplace, AccPlaceTransformer::class);
    }

    /**
     * @param GetAllAccPlacesRequest $request
     * @return array
     */
    public function getAllAccPlaces(GetAllAccPlacesRequest $request)
    {
        $accplaces = Apiato::call('AccPlace@GetAllAccPlacesAction', [$request]);

        return $this->transform($accplaces, AccPlaceTransformer::class);
    }

    /**
     * @param UpdateAccPlaceRequest $request
     * @return array
     */
    public function updateAccPlace(UpdateAccPlaceRequest $request)
    {
        $accplace = Apiato::call('AccPlace@UpdateAccPlaceAction', [$request]);

        $this->uploadMedia( $accplace, "image", true );
        $this->uploadMedia( $accplace, "gallery" );
        $this->uploadMedia( $accplace, "file" );

        return $this->transform($accplace, AccPlaceTransformer::class);
    }

    /**
     * @param DeleteAccPlaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPlace(DeleteAccPlaceRequest $request)
    {
        Apiato::call('AccPlace@DeleteAccPlaceAction', [$request]);

        return $this->noContent();
    }
}
