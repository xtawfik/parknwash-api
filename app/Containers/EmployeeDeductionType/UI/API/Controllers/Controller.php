<?php

namespace App\Containers\EmployeeDeductionType\UI\API\Controllers;

use App\Containers\EmployeeDeductionType\UI\API\Requests\CreateEmployeeDeductionTypeRequest;
use App\Containers\EmployeeDeductionType\UI\API\Requests\DeleteEmployeeDeductionTypeRequest;
use App\Containers\EmployeeDeductionType\UI\API\Requests\GetAllEmployeeDeductionTypesRequest;
use App\Containers\EmployeeDeductionType\UI\API\Requests\FindEmployeeDeductionTypeByIdRequest;
use App\Containers\EmployeeDeductionType\UI\API\Requests\UpdateEmployeeDeductionTypeRequest;
use App\Containers\EmployeeDeductionType\UI\API\Transformers\EmployeeDeductionTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\EmployeeDeductionType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateEmployeeDeductionTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createEmployeeDeductionType(CreateEmployeeDeductionTypeRequest $request)
    {
        $employeedeductiontype = Apiato::call('EmployeeDeductionType@CreateEmployeeDeductionTypeAction', [$request]);

        $this->uploadMedia( $employeedeductiontype, "image", true );
        $this->uploadMedia( $employeedeductiontype, "gallery" );
        $this->uploadMedia( $employeedeductiontype, "file" );

        return $this->created($this->transform($employeedeductiontype, EmployeeDeductionTypeTransformer::class));
    }

    /**
     * @param FindEmployeeDeductionTypeByIdRequest $request
     * @return array
     */
    public function findEmployeeDeductionTypeById(FindEmployeeDeductionTypeByIdRequest $request)
    {
        $employeedeductiontype = Apiato::call('EmployeeDeductionType@FindEmployeeDeductionTypeByIdAction', [$request]);

        return $this->transform($employeedeductiontype, EmployeeDeductionTypeTransformer::class);
    }

    /**
     * @param GetAllEmployeeDeductionTypesRequest $request
     * @return array
     */
    public function getAllEmployeeDeductionTypes(GetAllEmployeeDeductionTypesRequest $request)
    {
        $employeedeductiontypes = Apiato::call('EmployeeDeductionType@GetAllEmployeeDeductionTypesAction', [$request]);

        return $this->transform($employeedeductiontypes, EmployeeDeductionTypeTransformer::class);
    }

    /**
     * @param UpdateEmployeeDeductionTypeRequest $request
     * @return array
     */
    public function updateEmployeeDeductionType(UpdateEmployeeDeductionTypeRequest $request)
    {
        $employeedeductiontype = Apiato::call('EmployeeDeductionType@UpdateEmployeeDeductionTypeAction', [$request]);

        $this->uploadMedia( $employeedeductiontype, "image", true );
        $this->uploadMedia( $employeedeductiontype, "gallery" );
        $this->uploadMedia( $employeedeductiontype, "file" );

        return $this->transform($employeedeductiontype, EmployeeDeductionTypeTransformer::class);
    }

    /**
     * @param DeleteEmployeeDeductionTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmployeeDeductionType(DeleteEmployeeDeductionTypeRequest $request)
    {
        Apiato::call('EmployeeDeductionType@DeleteEmployeeDeductionTypeAction', [$request]);

        return $this->noContent();
    }
}
