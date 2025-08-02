<?php

namespace App\Containers\Account\UI\API\Controllers;

use App\Containers\Account\UI\API\Requests\CreateAccountRequest;
use App\Containers\Account\UI\API\Requests\DeleteAccountRequest;
use App\Containers\Account\UI\API\Requests\GetAllAccountsRequest;
use App\Containers\Account\UI\API\Requests\FindAccountByIdRequest;
use App\Containers\Account\UI\API\Requests\UpdateAccountRequest;
use App\Containers\Account\UI\API\Transformers\AccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Account\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccount(CreateAccountRequest $request)
    {
        $account = Apiato::call('Account@CreateAccountAction', [$request]);

        $this->uploadMedia( $account, "image", true );
        $this->uploadMedia( $account, "gallery" );
        $this->uploadMedia( $account, "file" );

        return $this->created($this->transform($account, AccountTransformer::class));
    }

    /**
     * @param FindAccountByIdRequest $request
     * @return array
     */
    public function findAccountById(FindAccountByIdRequest $request)
    {
        $account = Apiato::call('Account@FindAccountByIdAction', [$request]);

        return $this->transform($account, AccountTransformer::class);
    }

    /**
     * @param GetAllAccountsRequest $request
     * @return array
     */
    public function getAllAccounts(GetAllAccountsRequest $request)
    {
        $accounts = Apiato::call('Account@GetAllAccountsAction', [$request]);

        return $this->transform($accounts, AccountTransformer::class);
    }

    /**
     * @param UpdateAccountRequest $request
     * @return array
     */
    public function updateAccount(UpdateAccountRequest $request)
    {
        $account = Apiato::call('Account@UpdateAccountAction', [$request]);

        $this->uploadMedia( $account, "image", true );
        $this->uploadMedia( $account, "gallery" );
        $this->uploadMedia( $account, "file" );

        return $this->transform($account, AccountTransformer::class);
    }

    /**
     * @param DeleteAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccount(DeleteAccountRequest $request)
    {
        Apiato::call('Account@DeleteAccountAction', [$request]);

        return $this->noContent();
    }
}
