<?php

namespace App\Containers\DeductionType\UI\API\Controllers;

use App\Containers\DeductionType\UI\API\Requests\CreateDeductionTypeRequest;
use App\Containers\DeductionType\UI\API\Requests\DeleteDeductionTypeRequest;
use App\Containers\DeductionType\UI\API\Requests\GetAllDeductionTypesRequest;
use App\Containers\DeductionType\UI\API\Requests\FindDeductionTypeByIdRequest;
use App\Containers\DeductionType\UI\API\Requests\UpdateDeductionTypeRequest;
use App\Containers\DeductionType\UI\API\Transformers\DeductionTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\DeductionType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDeductionTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDeductionType(CreateDeductionTypeRequest $request)
    {
        $deductiontype = Apiato::call('DeductionType@CreateDeductionTypeAction', [$request]);

        $this->uploadMedia( $deductiontype, "image", true );
        $this->uploadMedia( $deductiontype, "gallery" );
        $this->uploadMedia( $deductiontype, "file" );

        return $this->created($this->transform($deductiontype, DeductionTypeTransformer::class));
    }

    /**
     * @param FindDeductionTypeByIdRequest $request
     * @return array
     */
    public function findDeductionTypeById(FindDeductionTypeByIdRequest $request)
    {
        $deductiontype = Apiato::call('DeductionType@FindDeductionTypeByIdAction', [$request]);

        return $this->transform($deductiontype, DeductionTypeTransformer::class);
    }

    /**
     * @param GetAllDeductionTypesRequest $request
     * @return array
     */
    public function getAllDeductionTypes(GetAllDeductionTypesRequest $request)
    {
        $deductiontypes = Apiato::call('DeductionType@GetAllDeductionTypesAction', [$request]);

        return $this->transform($deductiontypes, DeductionTypeTransformer::class);
    }

    /**
     * @param UpdateDeductionTypeRequest $request
     * @return array
     */
    public function updateDeductionType(UpdateDeductionTypeRequest $request)
    {
        $deductiontype = Apiato::call('DeductionType@UpdateDeductionTypeAction', [$request]);

        $this->uploadMedia( $deductiontype, "image", true );
        $this->uploadMedia( $deductiontype, "gallery" );
        $this->uploadMedia( $deductiontype, "file" );

        return $this->transform($deductiontype, DeductionTypeTransformer::class);
    }

    /**
     * @param DeleteDeductionTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDeductionType(DeleteDeductionTypeRequest $request)
    {
        Apiato::call('DeductionType@DeleteDeductionTypeAction', [$request]);

        return $this->noContent();
    }
}
