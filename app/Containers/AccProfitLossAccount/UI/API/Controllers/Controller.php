<?php

namespace App\Containers\AccProfitLossAccount\UI\API\Controllers;

use App\Containers\AccProfitLossAccount\UI\API\Requests\CreateAccProfitLossAccountRequest;
use App\Containers\AccProfitLossAccount\UI\API\Requests\DeleteAccProfitLossAccountRequest;
use App\Containers\AccProfitLossAccount\UI\API\Requests\GetAllAccProfitLossAccountsRequest;
use App\Containers\AccProfitLossAccount\UI\API\Requests\FindAccProfitLossAccountByIdRequest;
use App\Containers\AccProfitLossAccount\UI\API\Requests\UpdateAccProfitLossAccountRequest;
use App\Containers\AccProfitLossAccount\UI\API\Transformers\AccProfitLossAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccProfitLossAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccProfitLossAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccProfitLossAccount(CreateAccProfitLossAccountRequest $request)
    {
        $accprofitlossaccount = Apiato::call('AccProfitLossAccount@CreateAccProfitLossAccountAction', [$request]);

        $this->uploadMedia( $accprofitlossaccount, "image", true );
        $this->uploadMedia( $accprofitlossaccount, "gallery" );
        $this->uploadMedia( $accprofitlossaccount, "file" );

        return $this->created($this->transform($accprofitlossaccount, AccProfitLossAccountTransformer::class));
    }

    /**
     * @param FindAccProfitLossAccountByIdRequest $request
     * @return array
     */
    public function findAccProfitLossAccountById(FindAccProfitLossAccountByIdRequest $request)
    {
        $accprofitlossaccount = Apiato::call('AccProfitLossAccount@FindAccProfitLossAccountByIdAction', [$request]);

        return $this->transform($accprofitlossaccount, AccProfitLossAccountTransformer::class);
    }

    /**
     * @param GetAllAccProfitLossAccountsRequest $request
     * @return array
     */
    public function getAllAccProfitLossAccounts(GetAllAccProfitLossAccountsRequest $request)
    {
        $accprofitlossaccounts = Apiato::call('AccProfitLossAccount@GetAllAccProfitLossAccountsAction', [$request]);

        return $this->transform($accprofitlossaccounts, AccProfitLossAccountTransformer::class);
    }

    /**
     * @param UpdateAccProfitLossAccountRequest $request
     * @return array
     */
    public function updateAccProfitLossAccount(UpdateAccProfitLossAccountRequest $request)
    {
        $accprofitlossaccount = Apiato::call('AccProfitLossAccount@UpdateAccProfitLossAccountAction', [$request]);

        $this->uploadMedia( $accprofitlossaccount, "image", true );
        $this->uploadMedia( $accprofitlossaccount, "gallery" );
        $this->uploadMedia( $accprofitlossaccount, "file" );

        return $this->transform($accprofitlossaccount, AccProfitLossAccountTransformer::class);
    }

    /**
     * @param DeleteAccProfitLossAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccProfitLossAccount(DeleteAccProfitLossAccountRequest $request)
    {
        Apiato::call('AccProfitLossAccount@DeleteAccProfitLossAccountAction', [$request]);

        return $this->noContent();
    }
}
