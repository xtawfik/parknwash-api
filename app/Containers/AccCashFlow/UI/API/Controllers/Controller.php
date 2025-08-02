<?php

namespace App\Containers\AccCashFlow\UI\API\Controllers;

use App\Containers\AccCashFlow\UI\API\Requests\CreateAccCashFlowRequest;
use App\Containers\AccCashFlow\UI\API\Requests\DeleteAccCashFlowRequest;
use App\Containers\AccCashFlow\UI\API\Requests\GetAllAccCashFlowsRequest;
use App\Containers\AccCashFlow\UI\API\Requests\FindAccCashFlowByIdRequest;
use App\Containers\AccCashFlow\UI\API\Requests\UpdateAccCashFlowRequest;
use App\Containers\AccCashFlow\UI\API\Transformers\AccCashFlowTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCashFlow\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCashFlowRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCashFlow(CreateAccCashFlowRequest $request)
    {
        $acccashflow = Apiato::call('AccCashFlow@CreateAccCashFlowAction', [$request]);

        $this->uploadMedia( $acccashflow, "image", true );
        $this->uploadMedia( $acccashflow, "gallery" );
        $this->uploadMedia( $acccashflow, "file" );

        return $this->created($this->transform($acccashflow, AccCashFlowTransformer::class));
    }

    /**
     * @param FindAccCashFlowByIdRequest $request
     * @return array
     */
    public function findAccCashFlowById(FindAccCashFlowByIdRequest $request)
    {
        $acccashflow = Apiato::call('AccCashFlow@FindAccCashFlowByIdAction', [$request]);

        return $this->transform($acccashflow, AccCashFlowTransformer::class);
    }

    /**
     * @param GetAllAccCashFlowsRequest $request
     * @return array
     */
    public function getAllAccCashFlows(GetAllAccCashFlowsRequest $request)
    {
        $acccashflows = Apiato::call('AccCashFlow@GetAllAccCashFlowsAction', [$request]);

        return $this->transform($acccashflows, AccCashFlowTransformer::class);
    }

    /**
     * @param UpdateAccCashFlowRequest $request
     * @return array
     */
    public function updateAccCashFlow(UpdateAccCashFlowRequest $request)
    {
        $acccashflow = Apiato::call('AccCashFlow@UpdateAccCashFlowAction', [$request]);

        $this->uploadMedia( $acccashflow, "image", true );
        $this->uploadMedia( $acccashflow, "gallery" );
        $this->uploadMedia( $acccashflow, "file" );

        return $this->transform($acccashflow, AccCashFlowTransformer::class);
    }

    /**
     * @param DeleteAccCashFlowRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCashFlow(DeleteAccCashFlowRequest $request)
    {
        Apiato::call('AccCashFlow@DeleteAccCashFlowAction', [$request]);

        return $this->noContent();
    }
}
