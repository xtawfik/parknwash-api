<?php

namespace App\Containers\Park\UI\API\Controllers;

use App\Containers\Park\UI\API\Requests\CreateParkRequest;
use App\Containers\Park\UI\API\Requests\DeleteParkRequest;
use App\Containers\Park\UI\API\Requests\GetAllParksRequest;
use App\Containers\Park\UI\API\Requests\FindParkByIdRequest;
use App\Containers\Park\UI\API\Requests\UpdateParkRequest;
use App\Containers\Park\UI\API\Transformers\ParkTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Park\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateParkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPark(CreateParkRequest $request)
    {
        $park = Apiato::call('Park@CreateParkAction', [$request]);

        $this->uploadMedia( $park, "image", true );
        $this->uploadMedia( $park, "gallery" );
        $this->uploadMedia( $park, "file" );

        return $this->created($this->transform($park, ParkTransformer::class));
    }

    /**
     * @param FindParkByIdRequest $request
     * @return array
     */
    public function findParkById(FindParkByIdRequest $request)
    {
        $park = Apiato::call('Park@FindParkByIdAction', [$request]);

        return $this->transform($park, ParkTransformer::class);
    }

    /**
     * @param GetAllParksRequest $request
     * @return array
     */
    public function getAllParks(GetAllParksRequest $request)
    {
        $parks = Apiato::call('Park@GetAllParksAction', [$request]);

        return $this->transform($parks, ParkTransformer::class);
    }

    /**
     * @param UpdateParkRequest $request
     * @return array
     */
    public function updatePark(UpdateParkRequest $request)
    {
        $park = Apiato::call('Park@UpdateParkAction', [$request]);

        $this->uploadMedia( $park, "image", true );
        $this->uploadMedia( $park, "gallery" );
        $this->uploadMedia( $park, "file" );

        return $this->transform($park, ParkTransformer::class);
    }

    /**
     * @param DeleteParkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePark(DeleteParkRequest $request)
    {
        Apiato::call('Park@DeleteParkAction', [$request]);

        return $this->noContent();
    }
}
