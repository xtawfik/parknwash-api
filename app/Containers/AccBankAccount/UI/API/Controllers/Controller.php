<?php

namespace App\Containers\AccBankAccount\UI\API\Controllers;

use App\Containers\AccBankAccount\UI\API\Requests\CreateAccBankAccountRequest;
use App\Containers\AccBankAccount\UI\API\Requests\DeleteAccBankAccountRequest;
use App\Containers\AccBankAccount\UI\API\Requests\GetAllAccBankAccountsRequest;
use App\Containers\AccBankAccount\UI\API\Requests\FindAccBankAccountByIdRequest;
use App\Containers\AccBankAccount\UI\API\Requests\UpdateAccBankAccountRequest;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBankAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBankAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBankAccount(CreateAccBankAccountRequest $request)
    {
        $accbankaccount = Apiato::call('AccBankAccount@CreateAccBankAccountAction', [$request]);

        $this->uploadMedia( $accbankaccount, "image", true );
        $this->uploadMedia( $accbankaccount, "gallery" );
        $this->uploadMedia( $accbankaccount, "file" );

        return $this->created($this->transform($accbankaccount, AccBankAccountTransformer::class));
    }

    /**
     * @param FindAccBankAccountByIdRequest $request
     * @return array
     */
    public function findAccBankAccountById(FindAccBankAccountByIdRequest $request)
    {
        $accbankaccount = Apiato::call('AccBankAccount@FindAccBankAccountByIdAction', [$request]);

        return $this->transform($accbankaccount, AccBankAccountTransformer::class);
    }

    /**
     * @param GetAllAccBankAccountsRequest $request
     * @return array
     */
    public function getAllAccBankAccounts(GetAllAccBankAccountsRequest $request)
    {
        $accbankaccounts = Apiato::call('AccBankAccount@GetAllAccBankAccountsAction', [$request]);

        return $this->transform($accbankaccounts, AccBankAccountTransformer::class);
    }

    /**
     * @param UpdateAccBankAccountRequest $request
     * @return array
     */
    public function updateAccBankAccount(UpdateAccBankAccountRequest $request)
    {
        $accbankaccount = Apiato::call('AccBankAccount@UpdateAccBankAccountAction', [$request]);

        $this->uploadMedia( $accbankaccount, "image", true );
        $this->uploadMedia( $accbankaccount, "gallery" );
        $this->uploadMedia( $accbankaccount, "file" );

        return $this->transform($accbankaccount, AccBankAccountTransformer::class);
    }

    /**
     * @param DeleteAccBankAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBankAccount(DeleteAccBankAccountRequest $request)
    {
        Apiato::call('AccBankAccount@DeleteAccBankAccountAction', [$request]);

        return $this->noContent();
    }
}
