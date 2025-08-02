<?php

namespace App\Containers\AccClearedBalance\UI\API\Controllers;

use App\Containers\AccClearedBalance\UI\API\Requests\CreateAccClearedBalanceRequest;
use App\Containers\AccClearedBalance\UI\API\Requests\DeleteAccClearedBalanceRequest;
use App\Containers\AccClearedBalance\UI\API\Requests\GetAllAccClearedBalancesRequest;
use App\Containers\AccClearedBalance\UI\API\Requests\FindAccClearedBalanceByIdRequest;
use App\Containers\AccClearedBalance\UI\API\Requests\UpdateAccClearedBalanceRequest;
use App\Containers\AccClearedBalance\UI\API\Transformers\AccClearedBalanceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccClearedBalance\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccClearedBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccClearedBalance(CreateAccClearedBalanceRequest $request)
    {
        $accclearedbalance = Apiato::call('AccClearedBalance@CreateAccClearedBalanceAction', [$request]);

        $this->uploadMedia( $accclearedbalance, "image", true );
        $this->uploadMedia( $accclearedbalance, "gallery" );
        $this->uploadMedia( $accclearedbalance, "file" );

        return $this->created($this->transform($accclearedbalance, AccClearedBalanceTransformer::class));
    }

    /**
     * @param FindAccClearedBalanceByIdRequest $request
     * @return array
     */
    public function findAccClearedBalanceById(FindAccClearedBalanceByIdRequest $request)
    {
        $accclearedbalance = Apiato::call('AccClearedBalance@FindAccClearedBalanceByIdAction', [$request]);

        return $this->transform($accclearedbalance, AccClearedBalanceTransformer::class);
    }

    /**
     * @param GetAllAccClearedBalancesRequest $request
     * @return array
     */
    public function getAllAccClearedBalances(GetAllAccClearedBalancesRequest $request)
    {
        $accclearedbalances = Apiato::call('AccClearedBalance@GetAllAccClearedBalancesAction', [$request]);

        return $this->transform($accclearedbalances, AccClearedBalanceTransformer::class);
    }

    /**
     * @param UpdateAccClearedBalanceRequest $request
     * @return array
     */
    public function updateAccClearedBalance(UpdateAccClearedBalanceRequest $request)
    {
        $accclearedbalance = Apiato::call('AccClearedBalance@UpdateAccClearedBalanceAction', [$request]);

        $this->uploadMedia( $accclearedbalance, "image", true );
        $this->uploadMedia( $accclearedbalance, "gallery" );
        $this->uploadMedia( $accclearedbalance, "file" );

        return $this->transform($accclearedbalance, AccClearedBalanceTransformer::class);
    }

    /**
     * @param DeleteAccClearedBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccClearedBalance(DeleteAccClearedBalanceRequest $request)
    {
        Apiato::call('AccClearedBalance@DeleteAccClearedBalanceAction', [$request]);

        return $this->noContent();
    }
}
