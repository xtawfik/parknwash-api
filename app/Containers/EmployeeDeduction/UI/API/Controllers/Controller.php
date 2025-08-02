<?php

namespace App\Containers\EmployeeDeduction\UI\API\Controllers;

use App\Containers\EmployeeDeduction\UI\API\Requests\CreateEmployeeDeductionRequest;
use App\Containers\EmployeeDeduction\UI\API\Requests\DeleteEmployeeDeductionRequest;
use App\Containers\EmployeeDeduction\UI\API\Requests\GetAllEmployeeDeductionsRequest;
use App\Containers\EmployeeDeduction\UI\API\Requests\FindEmployeeDeductionByIdRequest;
use App\Containers\EmployeeDeduction\UI\API\Requests\UpdateEmployeeDeductionRequest;
use App\Containers\EmployeeDeduction\UI\API\Transformers\EmployeeDeductionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EmployeeDeduction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEmployeeDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEmployeeDeduction(CreateEmployeeDeductionRequest $request)
    {
        $employeededuction = Apiato::call('EmployeeDeduction@CreateEmployeeDeductionAction', [$request]);

        $this->uploadMedia( $employeededuction, "image", true );
        $this->uploadMedia( $employeededuction, "gallery" );
        $this->uploadMedia( $employeededuction, "file" );

        return $this->created($this->transform($employeededuction, EmployeeDeductionTransformer::class));
    }

    /**
     * @param FindEmployeeDeductionByIdRequest $request
     * @return array
     */
    public function findEmployeeDeductionById(FindEmployeeDeductionByIdRequest $request)
    {
        $employeededuction = Apiato::call('EmployeeDeduction@FindEmployeeDeductionByIdAction', [$request]);

        return $this->transform($employeededuction, EmployeeDeductionTransformer::class);
    }

    /**
     * @param GetAllEmployeeDeductionsRequest $request
     * @return array
     */
    public function getAllEmployeeDeductions(GetAllEmployeeDeductionsRequest $request)
    {
        $employeedeductions = Apiato::call('EmployeeDeduction@GetAllEmployeeDeductionsAction', [$request]);

        return $this->transform($employeedeductions, EmployeeDeductionTransformer::class);
    }

    /**
     * @param UpdateEmployeeDeductionRequest $request
     * @return array
     */
    public function updateEmployeeDeduction(UpdateEmployeeDeductionRequest $request)
    {
        $employeededuction = Apiato::call('EmployeeDeduction@UpdateEmployeeDeductionAction', [$request]);

        $this->uploadMedia( $employeededuction, "image", true );
        $this->uploadMedia( $employeededuction, "gallery" );
        $this->uploadMedia( $employeededuction, "file" );

        return $this->transform($employeededuction, EmployeeDeductionTransformer::class);
    }

    /**
     * @param DeleteEmployeeDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmployeeDeduction(DeleteEmployeeDeductionRequest $request)
    {
        Apiato::call('EmployeeDeduction@DeleteEmployeeDeductionAction', [$request]);

        return $this->noContent();
    }
}
