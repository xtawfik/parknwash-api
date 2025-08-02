<?php

namespace App\Containers\EmployeeTermination\UI\API\Controllers;

use App\Containers\EmployeeTermination\UI\API\Requests\CreateEmployeeTerminationRequest;
use App\Containers\EmployeeTermination\UI\API\Requests\DeleteEmployeeTerminationRequest;
use App\Containers\EmployeeTermination\UI\API\Requests\GetAllEmployeeTerminationsRequest;
use App\Containers\EmployeeTermination\UI\API\Requests\FindEmployeeTerminationByIdRequest;
use App\Containers\EmployeeTermination\UI\API\Requests\UpdateEmployeeTerminationRequest;
use App\Containers\EmployeeTermination\UI\API\Transformers\EmployeeTerminationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EmployeeTermination\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEmployeeTerminationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEmployeeTermination(CreateEmployeeTerminationRequest $request)
    {
        $employeetermination = Apiato::call('EmployeeTermination@CreateEmployeeTerminationAction', [$request]);

        $this->uploadMedia( $employeetermination, "image", true );
        $this->uploadMedia( $employeetermination, "gallery" );
        $this->uploadMedia( $employeetermination, "file" );

        return $this->created($this->transform($employeetermination, EmployeeTerminationTransformer::class));
    }

    /**
     * @param FindEmployeeTerminationByIdRequest $request
     * @return array
     */
    public function findEmployeeTerminationById(FindEmployeeTerminationByIdRequest $request)
    {
        $employeetermination = Apiato::call('EmployeeTermination@FindEmployeeTerminationByIdAction', [$request]);

        return $this->transform($employeetermination, EmployeeTerminationTransformer::class);
    }

    /**
     * @param GetAllEmployeeTerminationsRequest $request
     * @return array
     */
    public function getAllEmployeeTerminations(GetAllEmployeeTerminationsRequest $request)
    {
        $employeeterminations = Apiato::call('EmployeeTermination@GetAllEmployeeTerminationsAction', [$request]);

        return $this->transform($employeeterminations, EmployeeTerminationTransformer::class);
    }

    /**
     * @param UpdateEmployeeTerminationRequest $request
     * @return array
     */
    public function updateEmployeeTermination(UpdateEmployeeTerminationRequest $request)
    {
        $employeetermination = Apiato::call('EmployeeTermination@UpdateEmployeeTerminationAction', [$request]);

        $this->uploadMedia( $employeetermination, "image", true );
        $this->uploadMedia( $employeetermination, "gallery" );
        $this->uploadMedia( $employeetermination, "file" );

        return $this->transform($employeetermination, EmployeeTerminationTransformer::class);
    }

    /**
     * @param DeleteEmployeeTerminationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmployeeTermination(DeleteEmployeeTerminationRequest $request)
    {
        Apiato::call('EmployeeTermination@DeleteEmployeeTerminationAction', [$request]);

        return $this->noContent();
    }
}
