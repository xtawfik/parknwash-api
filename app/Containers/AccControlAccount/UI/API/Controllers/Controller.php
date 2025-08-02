<?php

namespace App\Containers\AccControlAccount\UI\API\Controllers;

use App\Containers\AccControlAccount\UI\API\Requests\CreateAccControlAccountRequest;
use App\Containers\AccControlAccount\UI\API\Requests\DeleteAccControlAccountRequest;
use App\Containers\AccControlAccount\UI\API\Requests\GetAllAccControlAccountsRequest;
use App\Containers\AccControlAccount\UI\API\Requests\FindAccControlAccountByIdRequest;
use App\Containers\AccControlAccount\UI\API\Requests\UpdateAccControlAccountRequest;
use App\Containers\AccControlAccount\UI\API\Transformers\AccControlAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccControlAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccControlAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccControlAccount(CreateAccControlAccountRequest $request)
    {
        $acccontrolaccount = Apiato::call('AccControlAccount@CreateAccControlAccountAction', [$request]);

        $this->uploadMedia( $acccontrolaccount, "image", true );
        $this->uploadMedia( $acccontrolaccount, "gallery" );
        $this->uploadMedia( $acccontrolaccount, "file" );

        return $this->created($this->transform($acccontrolaccount, AccControlAccountTransformer::class));
    }

    /**
     * @param FindAccControlAccountByIdRequest $request
     * @return array
     */
    public function findAccControlAccountById(FindAccControlAccountByIdRequest $request)
    {
        $acccontrolaccount = Apiato::call('AccControlAccount@FindAccControlAccountByIdAction', [$request]);

        return $this->transform($acccontrolaccount, AccControlAccountTransformer::class);
    }

    /**
     * @param GetAllAccControlAccountsRequest $request
     * @return array
     */
    public function getAllAccControlAccounts(GetAllAccControlAccountsRequest $request)
    {
        $acccontrolaccounts = Apiato::call('AccControlAccount@GetAllAccControlAccountsAction', [$request]);

        return $this->transform($acccontrolaccounts, AccControlAccountTransformer::class);
    }

    /**
     * @param UpdateAccControlAccountRequest $request
     * @return array
     */
    public function updateAccControlAccount(UpdateAccControlAccountRequest $request)
    {
        $acccontrolaccount = Apiato::call('AccControlAccount@UpdateAccControlAccountAction', [$request]);

        $this->uploadMedia( $acccontrolaccount, "image", true );
        $this->uploadMedia( $acccontrolaccount, "gallery" );
        $this->uploadMedia( $acccontrolaccount, "file" );

        return $this->transform($acccontrolaccount, AccControlAccountTransformer::class);
    }

    /**
     * @param DeleteAccControlAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccControlAccount(DeleteAccControlAccountRequest $request)
    {
        Apiato::call('AccControlAccount@DeleteAccControlAccountAction', [$request]);

        return $this->noContent();
    }
}
