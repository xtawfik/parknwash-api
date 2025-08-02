<?php

namespace App\Containers\VacationType\UI\API\Controllers;

use App\Containers\VacationType\UI\API\Requests\CreateVacationTypeRequest;
use App\Containers\VacationType\UI\API\Requests\DeleteVacationTypeRequest;
use App\Containers\VacationType\UI\API\Requests\GetAllVacationTypesRequest;
use App\Containers\VacationType\UI\API\Requests\FindVacationTypeByIdRequest;
use App\Containers\VacationType\UI\API\Requests\UpdateVacationTypeRequest;
use App\Containers\VacationType\UI\API\Transformers\VacationTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\VacationType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateVacationTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVacationType(CreateVacationTypeRequest $request)
    {
        $vacationtype = Apiato::call('VacationType@CreateVacationTypeAction', [$request]);

        $this->uploadMedia( $vacationtype, "image", true );
        $this->uploadMedia( $vacationtype, "gallery" );
        $this->uploadMedia( $vacationtype, "file" );

        return $this->created($this->transform($vacationtype, VacationTypeTransformer::class));
    }

    /**
     * @param FindVacationTypeByIdRequest $request
     * @return array
     */
    public function findVacationTypeById(FindVacationTypeByIdRequest $request)
    {
        $vacationtype = Apiato::call('VacationType@FindVacationTypeByIdAction', [$request]);

        return $this->transform($vacationtype, VacationTypeTransformer::class);
    }

    /**
     * @param GetAllVacationTypesRequest $request
     * @return array
     */
    public function getAllVacationTypes(GetAllVacationTypesRequest $request)
    {
        $vacationtypes = Apiato::call('VacationType@GetAllVacationTypesAction', [$request]);

        return $this->transform($vacationtypes, VacationTypeTransformer::class);
    }

    /**
     * @param UpdateVacationTypeRequest $request
     * @return array
     */
    public function updateVacationType(UpdateVacationTypeRequest $request)
    {
        $vacationtype = Apiato::call('VacationType@UpdateVacationTypeAction', [$request]);

        $this->uploadMedia( $vacationtype, "image", true );
        $this->uploadMedia( $vacationtype, "gallery" );
        $this->uploadMedia( $vacationtype, "file" );

        return $this->transform($vacationtype, VacationTypeTransformer::class);
    }

    /**
     * @param DeleteVacationTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVacationType(DeleteVacationTypeRequest $request)
    {
        Apiato::call('VacationType@DeleteVacationTypeAction', [$request]);

        return $this->noContent();
    }
}
