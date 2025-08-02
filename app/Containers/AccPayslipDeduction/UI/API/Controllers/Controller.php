<?php

namespace App\Containers\AccPayslipDeduction\UI\API\Controllers;

use App\Containers\AccPayslipDeduction\UI\API\Requests\CreateAccPayslipDeductionRequest;
use App\Containers\AccPayslipDeduction\UI\API\Requests\DeleteAccPayslipDeductionRequest;
use App\Containers\AccPayslipDeduction\UI\API\Requests\GetAllAccPayslipDeductionsRequest;
use App\Containers\AccPayslipDeduction\UI\API\Requests\FindAccPayslipDeductionByIdRequest;
use App\Containers\AccPayslipDeduction\UI\API\Requests\UpdateAccPayslipDeductionRequest;
use App\Containers\AccPayslipDeduction\UI\API\Transformers\AccPayslipDeductionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslipDeduction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslipDeduction(CreateAccPayslipDeductionRequest $request)
    {
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@CreateAccPayslipDeductionAction', [$request]);

        $this->uploadMedia( $accpayslipdeduction, "image", true );
        $this->uploadMedia( $accpayslipdeduction, "gallery" );
        $this->uploadMedia( $accpayslipdeduction, "file" );

        return $this->created($this->transform($accpayslipdeduction, AccPayslipDeductionTransformer::class));
    }

    /**
     * @param FindAccPayslipDeductionByIdRequest $request
     * @return array
     */
    public function findAccPayslipDeductionById(FindAccPayslipDeductionByIdRequest $request)
    {
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@FindAccPayslipDeductionByIdAction', [$request]);

        return $this->transform($accpayslipdeduction, AccPayslipDeductionTransformer::class);
    }

    /**
     * @param GetAllAccPayslipDeductionsRequest $request
     * @return array
     */
    public function getAllAccPayslipDeductions(GetAllAccPayslipDeductionsRequest $request)
    {
        $accpayslipdeductions = Apiato::call('AccPayslipDeduction@GetAllAccPayslipDeductionsAction', [$request]);

        return $this->transform($accpayslipdeductions, AccPayslipDeductionTransformer::class);
    }

    /**
     * @param UpdateAccPayslipDeductionRequest $request
     * @return array
     */
    public function updateAccPayslipDeduction(UpdateAccPayslipDeductionRequest $request)
    {
        $accpayslipdeduction = Apiato::call('AccPayslipDeduction@UpdateAccPayslipDeductionAction', [$request]);

        $this->uploadMedia( $accpayslipdeduction, "image", true );
        $this->uploadMedia( $accpayslipdeduction, "gallery" );
        $this->uploadMedia( $accpayslipdeduction, "file" );

        return $this->transform($accpayslipdeduction, AccPayslipDeductionTransformer::class);
    }

    /**
     * @param DeleteAccPayslipDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslipDeduction(DeleteAccPayslipDeductionRequest $request)
    {
        Apiato::call('AccPayslipDeduction@DeleteAccPayslipDeductionAction', [$request]);

        return $this->noContent();
    }
}
