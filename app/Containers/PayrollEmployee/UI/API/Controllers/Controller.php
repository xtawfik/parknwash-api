<?php

namespace App\Containers\PayrollEmployee\UI\API\Controllers;

use App\Containers\PayrollEmployee\UI\API\Requests\CreatePayrollEmployeeRequest;
use App\Containers\PayrollEmployee\UI\API\Requests\DeletePayrollEmployeeRequest;
use App\Containers\PayrollEmployee\UI\API\Requests\GetAllPayrollEmployeesRequest;
use App\Containers\PayrollEmployee\UI\API\Requests\FindPayrollEmployeeByIdRequest;
use App\Containers\PayrollEmployee\UI\API\Requests\UpdatePayrollEmployeeRequest;
use App\Containers\PayrollEmployee\UI\API\Transformers\PayrollEmployeeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\PayrollEmployee\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePayrollEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPayrollEmployee(CreatePayrollEmployeeRequest $request)
    {
        $payrollemployee = Apiato::call('PayrollEmployee@CreatePayrollEmployeeAction', [$request]);

        $this->uploadMedia( $payrollemployee, "image", true );
        $this->uploadMedia( $payrollemployee, "gallery" );
        $this->uploadMedia( $payrollemployee, "file" );

        return $this->created($this->transform($payrollemployee, PayrollEmployeeTransformer::class));
    }

    /**
     * @param FindPayrollEmployeeByIdRequest $request
     * @return array
     */
    public function findPayrollEmployeeById(FindPayrollEmployeeByIdRequest $request)
    {
        $payrollemployee = Apiato::call('PayrollEmployee@FindPayrollEmployeeByIdAction', [$request]);

        return $this->transform($payrollemployee, PayrollEmployeeTransformer::class);
    }

    /**
     * @param GetAllPayrollEmployeesRequest $request
     * @return array
     */
    public function getAllPayrollEmployees(GetAllPayrollEmployeesRequest $request)
    {
        $payrollemployees = Apiato::call('PayrollEmployee@GetAllPayrollEmployeesAction', [$request]);

        return $this->transform($payrollemployees, PayrollEmployeeTransformer::class);
    }

    /**
     * @param UpdatePayrollEmployeeRequest $request
     * @return array
     */
    public function updatePayrollEmployee(UpdatePayrollEmployeeRequest $request)
    {
        $payrollemployee = Apiato::call('PayrollEmployee@UpdatePayrollEmployeeAction', [$request]);

        $this->uploadMedia( $payrollemployee, "image", true );
        $this->uploadMedia( $payrollemployee, "gallery" );
        $this->uploadMedia( $payrollemployee, "file" );

        return $this->transform($payrollemployee, PayrollEmployeeTransformer::class);
    }

    /**
     * @param DeletePayrollEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePayrollEmployee(DeletePayrollEmployeeRequest $request)
    {
        Apiato::call('PayrollEmployee@DeletePayrollEmployeeAction', [$request]);

        return $this->noContent();
    }
}
