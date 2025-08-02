<?php

namespace App\Containers\Payroll\UI\API\Controllers;

use App\Containers\Payroll\UI\API\Requests\CreatePayrollRequest;
use App\Containers\Payroll\UI\API\Requests\DeletePayrollRequest;
use App\Containers\Payroll\UI\API\Requests\GetAllPayrollsRequest;
use App\Containers\Payroll\UI\API\Requests\FindPayrollByIdRequest;
use App\Containers\Payroll\UI\API\Requests\UpdatePayrollRequest;
use App\Containers\Payroll\UI\API\Transformers\PayrollTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Payroll\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePayrollRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPayroll(CreatePayrollRequest $request)
    {
        $payroll = Apiato::call('Payroll@CreatePayrollAction', [$request]);

        $this->uploadMedia( $payroll, "image", true );
        $this->uploadMedia( $payroll, "gallery" );
        $this->uploadMedia( $payroll, "file" );

        return $this->created($this->transform($payroll, PayrollTransformer::class));
    }

    /**
     * @param FindPayrollByIdRequest $request
     * @return array
     */
    public function findPayrollById(FindPayrollByIdRequest $request)
    {
        $payroll = Apiato::call('Payroll@FindPayrollByIdAction', [$request]);

        return $this->transform($payroll, PayrollTransformer::class);
    }

    /**
     * @param GetAllPayrollsRequest $request
     * @return array
     */
    public function getAllPayrolls(GetAllPayrollsRequest $request)
    {
        $payrolls = Apiato::call('Payroll@GetAllPayrollsAction', [$request]);

        return $this->transform($payrolls, PayrollTransformer::class);
    }

    /**
     * @param UpdatePayrollRequest $request
     * @return array
     */
    public function updatePayroll(UpdatePayrollRequest $request)
    {
        $payroll = Apiato::call('Payroll@UpdatePayrollAction', [$request]);

        $this->uploadMedia( $payroll, "image", true );
        $this->uploadMedia( $payroll, "gallery" );
        $this->uploadMedia( $payroll, "file" );

        return $this->transform($payroll, PayrollTransformer::class);
    }

    /**
     * @param DeletePayrollRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePayroll(DeletePayrollRequest $request)
    {
        Apiato::call('Payroll@DeletePayrollAction', [$request]);

        return $this->noContent();
    }
}
