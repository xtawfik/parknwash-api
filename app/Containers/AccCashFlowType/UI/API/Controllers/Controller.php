<?php

namespace App\Containers\AccCashFlowType\UI\API\Controllers;

use App\Containers\AccCashFlowType\UI\API\Requests\CreateAccCashFlowTypeRequest;
use App\Containers\AccCashFlowType\UI\API\Requests\DeleteAccCashFlowTypeRequest;
use App\Containers\AccCashFlowType\UI\API\Requests\GetAllAccCashFlowTypesRequest;
use App\Containers\AccCashFlowType\UI\API\Requests\FindAccCashFlowTypeByIdRequest;
use App\Containers\AccCashFlowType\UI\API\Requests\UpdateAccCashFlowTypeRequest;
use App\Containers\AccCashFlowType\UI\API\Transformers\AccCashFlowTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCashFlowType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCashFlowTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCashFlowType(CreateAccCashFlowTypeRequest $request)
    {
        $acccashflowtype = Apiato::call('AccCashFlowType@CreateAccCashFlowTypeAction', [$request]);

        $this->uploadMedia( $acccashflowtype, "image", true );
        $this->uploadMedia( $acccashflowtype, "gallery" );
        $this->uploadMedia( $acccashflowtype, "file" );

        return $this->created($this->transform($acccashflowtype, AccCashFlowTypeTransformer::class));
    }

    /**
     * @param FindAccCashFlowTypeByIdRequest $request
     * @return array
     */
    public function findAccCashFlowTypeById(FindAccCashFlowTypeByIdRequest $request)
    {
        $acccashflowtype = Apiato::call('AccCashFlowType@FindAccCashFlowTypeByIdAction', [$request]);

        return $this->transform($acccashflowtype, AccCashFlowTypeTransformer::class);
    }

    /**
     * @param GetAllAccCashFlowTypesRequest $request
     * @return array
     */
    public function getAllAccCashFlowTypes(GetAllAccCashFlowTypesRequest $request)
    {
        $acccashflowtypes = Apiato::call('AccCashFlowType@GetAllAccCashFlowTypesAction', [$request]);

        return $this->transform($acccashflowtypes, AccCashFlowTypeTransformer::class);
    }

    /**
     * @param UpdateAccCashFlowTypeRequest $request
     * @return array
     */
    public function updateAccCashFlowType(UpdateAccCashFlowTypeRequest $request)
    {
        $acccashflowtype = Apiato::call('AccCashFlowType@UpdateAccCashFlowTypeAction', [$request]);

        $this->uploadMedia( $acccashflowtype, "image", true );
        $this->uploadMedia( $acccashflowtype, "gallery" );
        $this->uploadMedia( $acccashflowtype, "file" );

        return $this->transform($acccashflowtype, AccCashFlowTypeTransformer::class);
    }

    /**
     * @param DeleteAccCashFlowTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCashFlowType(DeleteAccCashFlowTypeRequest $request)
    {
        Apiato::call('AccCashFlowType@DeleteAccCashFlowTypeAction', [$request]);

        return $this->noContent();
    }
}
