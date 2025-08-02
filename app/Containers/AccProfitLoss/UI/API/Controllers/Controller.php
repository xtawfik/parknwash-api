<?php

namespace App\Containers\AccProfitLoss\UI\API\Controllers;

use App\Containers\AccProfitLoss\UI\API\Requests\CreateAccProfitLossRequest;
use App\Containers\AccProfitLoss\UI\API\Requests\DeleteAccProfitLossRequest;
use App\Containers\AccProfitLoss\UI\API\Requests\GetAllAccProfitLossesRequest;
use App\Containers\AccProfitLoss\UI\API\Requests\FindAccProfitLossByIdRequest;
use App\Containers\AccProfitLoss\UI\API\Requests\UpdateAccProfitLossRequest;
use App\Containers\AccProfitLoss\UI\API\Transformers\AccProfitLossTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccProfitLoss\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccProfitLossRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccProfitLoss(CreateAccProfitLossRequest $request)
    {
        $accprofitloss = Apiato::call('AccProfitLoss@CreateAccProfitLossAction', [$request]);

        $this->uploadMedia( $accprofitloss, "image", true );
        $this->uploadMedia( $accprofitloss, "gallery" );
        $this->uploadMedia( $accprofitloss, "file" );

        return $this->created($this->transform($accprofitloss, AccProfitLossTransformer::class));
    }

    /**
     * @param FindAccProfitLossByIdRequest $request
     * @return array
     */
    public function findAccProfitLossById(FindAccProfitLossByIdRequest $request)
    {
        $accprofitloss = Apiato::call('AccProfitLoss@FindAccProfitLossByIdAction', [$request]);

        return $this->transform($accprofitloss, AccProfitLossTransformer::class);
    }

    /**
     * @param GetAllAccProfitLossesRequest $request
     * @return array
     */
    public function getAllAccProfitLosses(GetAllAccProfitLossesRequest $request)
    {
        $accprofitlosses = Apiato::call('AccProfitLoss@GetAllAccProfitLossesAction', [$request]);

        return $this->transform($accprofitlosses, AccProfitLossTransformer::class);
    }

    /**
     * @param UpdateAccProfitLossRequest $request
     * @return array
     */
    public function updateAccProfitLoss(UpdateAccProfitLossRequest $request)
    {
        $accprofitloss = Apiato::call('AccProfitLoss@UpdateAccProfitLossAction', [$request]);

        $this->uploadMedia( $accprofitloss, "image", true );
        $this->uploadMedia( $accprofitloss, "gallery" );
        $this->uploadMedia( $accprofitloss, "file" );

        return $this->transform($accprofitloss, AccProfitLossTransformer::class);
    }

    /**
     * @param DeleteAccProfitLossRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccProfitLoss(DeleteAccProfitLossRequest $request)
    {
        Apiato::call('AccProfitLoss@DeleteAccProfitLossAction', [$request]);

        return $this->noContent();
    }
}
