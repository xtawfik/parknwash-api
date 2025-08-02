<?php

namespace App\Containers\Vacation\UI\API\Controllers;

use App\Containers\Vacation\UI\API\Requests\CreateVacationRequest;
use App\Containers\Vacation\UI\API\Requests\DeleteVacationRequest;
use App\Containers\Vacation\UI\API\Requests\GetAllVacationsRequest;
use App\Containers\Vacation\UI\API\Requests\FindVacationByIdRequest;
use App\Containers\Vacation\UI\API\Requests\UpdateVacationRequest;
use App\Containers\Vacation\UI\API\Transformers\VacationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Vacation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateVacationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVacation(CreateVacationRequest $request)
    {
        $vacation = Apiato::call('Vacation@CreateVacationAction', [$request]);

        $this->uploadMedia( $vacation, "image", true );
        $this->uploadMedia( $vacation, "gallery" );
        $this->uploadMedia( $vacation, "file" );

        return $this->created($this->transform($vacation, VacationTransformer::class));
    }

    /**
     * @param FindVacationByIdRequest $request
     * @return array
     */
    public function findVacationById(FindVacationByIdRequest $request)
    {
        $vacation = Apiato::call('Vacation@FindVacationByIdAction', [$request]);

        return $this->transform($vacation, VacationTransformer::class);
    }

    /**
     * @param GetAllVacationsRequest $request
     * @return array
     */
    public function getAllVacations(GetAllVacationsRequest $request)
    {
        $vacations = Apiato::call('Vacation@GetAllVacationsAction', [$request]);

        return $this->transform($vacations, VacationTransformer::class);
    }

    /**
     * @param UpdateVacationRequest $request
     * @return array
     */
    public function updateVacation(UpdateVacationRequest $request)
    {
        $vacation = Apiato::call('Vacation@UpdateVacationAction', [$request]);

        $this->uploadMedia( $vacation, "image", true );
        $this->uploadMedia( $vacation, "gallery" );
        $this->uploadMedia( $vacation, "file" );

        return $this->transform($vacation, VacationTransformer::class);
    }

    /**
     * @param DeleteVacationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVacation(DeleteVacationRequest $request)
    {
        Apiato::call('Vacation@DeleteVacationAction', [$request]);

        return $this->noContent();
    }
}
