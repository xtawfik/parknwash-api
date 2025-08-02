<?php

namespace App\Containers\AccEmployee\UI\API\Controllers;

use App\Containers\AccEmployee\UI\API\Requests\CreateAccEmployeeRequest;
use App\Containers\AccEmployee\UI\API\Requests\DeleteAccEmployeeRequest;
use App\Containers\AccEmployee\UI\API\Requests\GetAllAccEmployeesRequest;
use App\Containers\AccEmployee\UI\API\Requests\FindAccEmployeeByIdRequest;
use App\Containers\AccEmployee\UI\API\Requests\UpdateAccEmployeeRequest;
use App\Containers\AccEmployee\UI\API\Transformers\AccEmployeeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccEmployee\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccEmployee(CreateAccEmployeeRequest $request)
    {
        $accemployee = Apiato::call('AccEmployee@CreateAccEmployeeAction', [$request]);

        $this->uploadMedia( $accemployee, "image", true );
        $this->uploadMedia( $accemployee, "gallery" );
        $this->uploadMedia( $accemployee, "file" );

        return $this->created($this->transform($accemployee, AccEmployeeTransformer::class));
    }

    /**
     * @param FindAccEmployeeByIdRequest $request
     * @return array
     */
    public function findAccEmployeeById(FindAccEmployeeByIdRequest $request)
    {
        $accemployee = Apiato::call('AccEmployee@FindAccEmployeeByIdAction', [$request]);

        return $this->transform($accemployee, AccEmployeeTransformer::class);
    }

    /**
     * @param GetAllAccEmployeesRequest $request
     * @return array
     */
    public function getAllAccEmployees(GetAllAccEmployeesRequest $request)
    {
        $accemployees = Apiato::call('AccEmployee@GetAllAccEmployeesAction', [$request]);

        return $this->transform($accemployees, AccEmployeeTransformer::class);
    }

    /**
     * @param UpdateAccEmployeeRequest $request
     * @return array
     */
    public function updateAccEmployee(UpdateAccEmployeeRequest $request)
    {
        $accemployee = Apiato::call('AccEmployee@UpdateAccEmployeeAction', [$request]);

        $this->uploadMedia( $accemployee, "image", true );
        $this->uploadMedia( $accemployee, "gallery" );
        $this->uploadMedia( $accemployee, "file" );

        return $this->transform($accemployee, AccEmployeeTransformer::class);
    }

    /**
     * @param DeleteAccEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccEmployee(DeleteAccEmployeeRequest $request)
    {
        Apiato::call('AccEmployee@DeleteAccEmployeeAction', [$request]);

        return $this->noContent();
    }
}
