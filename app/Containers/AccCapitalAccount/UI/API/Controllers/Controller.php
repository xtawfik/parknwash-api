<?php

namespace App\Containers\AccCapitalAccount\UI\API\Controllers;

use App\Containers\AccCapitalAccount\UI\API\Requests\CreateAccCapitalAccountRequest;
use App\Containers\AccCapitalAccount\UI\API\Requests\DeleteAccCapitalAccountRequest;
use App\Containers\AccCapitalAccount\UI\API\Requests\GetAllAccCapitalAccountsRequest;
use App\Containers\AccCapitalAccount\UI\API\Requests\FindAccCapitalAccountByIdRequest;
use App\Containers\AccCapitalAccount\UI\API\Requests\UpdateAccCapitalAccountRequest;
use App\Containers\AccCapitalAccount\UI\API\Transformers\AccCapitalAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCapitalAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCapitalAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCapitalAccount(CreateAccCapitalAccountRequest $request)
    {
        $acccapitalaccount = Apiato::call('AccCapitalAccount@CreateAccCapitalAccountAction', [$request]);

        $this->uploadMedia( $acccapitalaccount, "image", true );
        $this->uploadMedia( $acccapitalaccount, "gallery" );
        $this->uploadMedia( $acccapitalaccount, "file" );

        return $this->created($this->transform($acccapitalaccount, AccCapitalAccountTransformer::class));
    }

    /**
     * @param FindAccCapitalAccountByIdRequest $request
     * @return array
     */
    public function findAccCapitalAccountById(FindAccCapitalAccountByIdRequest $request)
    {
        $acccapitalaccount = Apiato::call('AccCapitalAccount@FindAccCapitalAccountByIdAction', [$request]);

        return $this->transform($acccapitalaccount, AccCapitalAccountTransformer::class);
    }

    /**
     * @param GetAllAccCapitalAccountsRequest $request
     * @return array
     */
    public function getAllAccCapitalAccounts(GetAllAccCapitalAccountsRequest $request)
    {
        $acccapitalaccounts = Apiato::call('AccCapitalAccount@GetAllAccCapitalAccountsAction', [$request]);

        return $this->transform($acccapitalaccounts, AccCapitalAccountTransformer::class);
    }

    /**
     * @param UpdateAccCapitalAccountRequest $request
     * @return array
     */
    public function updateAccCapitalAccount(UpdateAccCapitalAccountRequest $request)
    {
        $acccapitalaccount = Apiato::call('AccCapitalAccount@UpdateAccCapitalAccountAction', [$request]);

        $this->uploadMedia( $acccapitalaccount, "image", true );
        $this->uploadMedia( $acccapitalaccount, "gallery" );
        $this->uploadMedia( $acccapitalaccount, "file" );

        return $this->transform($acccapitalaccount, AccCapitalAccountTransformer::class);
    }

    /**
     * @param DeleteAccCapitalAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCapitalAccount(DeleteAccCapitalAccountRequest $request)
    {
        Apiato::call('AccCapitalAccount@DeleteAccCapitalAccountAction', [$request]);

        return $this->noContent();
    }
}
