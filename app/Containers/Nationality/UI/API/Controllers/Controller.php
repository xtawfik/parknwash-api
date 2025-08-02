<?php

namespace App\Containers\Nationality\UI\API\Controllers;

use App\Containers\Nationality\UI\API\Requests\CreateNationalityRequest;
use App\Containers\Nationality\UI\API\Requests\DeleteNationalityRequest;
use App\Containers\Nationality\UI\API\Requests\GetAllNationalitiesRequest;
use App\Containers\Nationality\UI\API\Requests\FindNationalityByIdRequest;
use App\Containers\Nationality\UI\API\Requests\UpdateNationalityRequest;
use App\Containers\Nationality\UI\API\Transformers\NationalityTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Nationality\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateNationalityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNationality(CreateNationalityRequest $request)
    {
        $nationality = Apiato::call('Nationality@CreateNationalityAction', [$request]);

        $this->uploadMedia( $nationality, "image", true );
        $this->uploadMedia( $nationality, "gallery" );
        $this->uploadMedia( $nationality, "file" );

        return $this->created($this->transform($nationality, NationalityTransformer::class));
    }

    /**
     * @param FindNationalityByIdRequest $request
     * @return array
     */
    public function findNationalityById(FindNationalityByIdRequest $request)
    {
        $nationality = Apiato::call('Nationality@FindNationalityByIdAction', [$request]);

        return $this->transform($nationality, NationalityTransformer::class);
    }

    /**
     * @param GetAllNationalitiesRequest $request
     * @return array
     */
    public function getAllNationalities(GetAllNationalitiesRequest $request)
    {
        $nationalities = Apiato::call('Nationality@GetAllNationalitiesAction', [$request]);

        return $this->transform($nationalities, NationalityTransformer::class);
    }

    /**
     * @param UpdateNationalityRequest $request
     * @return array
     */
    public function updateNationality(UpdateNationalityRequest $request)
    {
        $nationality = Apiato::call('Nationality@UpdateNationalityAction', [$request]);

        $this->uploadMedia( $nationality, "image", true );
        $this->uploadMedia( $nationality, "gallery" );
        $this->uploadMedia( $nationality, "file" );

        return $this->transform($nationality, NationalityTransformer::class);
    }

    /**
     * @param DeleteNationalityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNationality(DeleteNationalityRequest $request)
    {
        Apiato::call('Nationality@DeleteNationalityAction', [$request]);

        return $this->noContent();
    }
}
