<?php

namespace App\Containers\Deduction\UI\API\Controllers;

use App\Containers\Deduction\UI\API\Requests\CreateDeductionRequest;
use App\Containers\Deduction\UI\API\Requests\DeleteDeductionRequest;
use App\Containers\Deduction\UI\API\Requests\GetAllDeductionsRequest;
use App\Containers\Deduction\UI\API\Requests\FindDeductionByIdRequest;
use App\Containers\Deduction\UI\API\Requests\UpdateDeductionRequest;
use App\Containers\Deduction\UI\API\Transformers\DeductionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Deduction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDeduction(CreateDeductionRequest $request)
    {
        $deduction = Apiato::call('Deduction@CreateDeductionAction', [$request]);

        $this->uploadMedia( $deduction, "image", true );
        $this->uploadMedia( $deduction, "gallery" );
        $this->uploadMedia( $deduction, "file" );

        return $this->created($this->transform($deduction, DeductionTransformer::class));
    }

    /**
     * @param FindDeductionByIdRequest $request
     * @return array
     */
    public function findDeductionById(FindDeductionByIdRequest $request)
    {
        $deduction = Apiato::call('Deduction@FindDeductionByIdAction', [$request]);

        return $this->transform($deduction, DeductionTransformer::class);
    }

    /**
     * @param GetAllDeductionsRequest $request
     * @return array
     */
    public function getAllDeductions(GetAllDeductionsRequest $request)
    {
        $deductions = Apiato::call('Deduction@GetAllDeductionsAction', [$request]);

        return $this->transform($deductions, DeductionTransformer::class);
    }

    /**
     * @param UpdateDeductionRequest $request
     * @return array
     */
    public function updateDeduction(UpdateDeductionRequest $request)
    {
        $deduction = Apiato::call('Deduction@UpdateDeductionAction', [$request]);

        $this->uploadMedia( $deduction, "image", true );
        $this->uploadMedia( $deduction, "gallery" );
        $this->uploadMedia( $deduction, "file" );

        return $this->transform($deduction, DeductionTransformer::class);
    }

    /**
     * @param DeleteDeductionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDeduction(DeleteDeductionRequest $request)
    {
        Apiato::call('Deduction@DeleteDeductionAction', [$request]);

        return $this->noContent();
    }
}
