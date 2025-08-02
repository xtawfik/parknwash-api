<?php

namespace App\Containers\AccCapitalSubAccount\UI\API\Controllers;

use App\Containers\AccCapitalSubAccount\UI\API\Requests\CreateAccCapitalSubAccountRequest;
use App\Containers\AccCapitalSubAccount\UI\API\Requests\DeleteAccCapitalSubAccountRequest;
use App\Containers\AccCapitalSubAccount\UI\API\Requests\GetAllAccCapitalSubAccountsRequest;
use App\Containers\AccCapitalSubAccount\UI\API\Requests\FindAccCapitalSubAccountByIdRequest;
use App\Containers\AccCapitalSubAccount\UI\API\Requests\UpdateAccCapitalSubAccountRequest;
use App\Containers\AccCapitalSubAccount\UI\API\Transformers\AccCapitalSubAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCapitalSubAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCapitalSubAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCapitalSubAccount(CreateAccCapitalSubAccountRequest $request)
    {
        $acccapitalsubaccount = Apiato::call('AccCapitalSubAccount@CreateAccCapitalSubAccountAction', [$request]);

        $this->uploadMedia( $acccapitalsubaccount, "image", true );
        $this->uploadMedia( $acccapitalsubaccount, "gallery" );
        $this->uploadMedia( $acccapitalsubaccount, "file" );

        return $this->created($this->transform($acccapitalsubaccount, AccCapitalSubAccountTransformer::class));
    }

    /**
     * @param FindAccCapitalSubAccountByIdRequest $request
     * @return array
     */
    public function findAccCapitalSubAccountById(FindAccCapitalSubAccountByIdRequest $request)
    {
        $acccapitalsubaccount = Apiato::call('AccCapitalSubAccount@FindAccCapitalSubAccountByIdAction', [$request]);

        return $this->transform($acccapitalsubaccount, AccCapitalSubAccountTransformer::class);
    }

    /**
     * @param GetAllAccCapitalSubAccountsRequest $request
     * @return array
     */
    public function getAllAccCapitalSubAccounts(GetAllAccCapitalSubAccountsRequest $request)
    {
        $acccapitalsubaccounts = Apiato::call('AccCapitalSubAccount@GetAllAccCapitalSubAccountsAction', [$request]);

        return $this->transform($acccapitalsubaccounts, AccCapitalSubAccountTransformer::class);
    }

    /**
     * @param UpdateAccCapitalSubAccountRequest $request
     * @return array
     */
    public function updateAccCapitalSubAccount(UpdateAccCapitalSubAccountRequest $request)
    {
        $acccapitalsubaccount = Apiato::call('AccCapitalSubAccount@UpdateAccCapitalSubAccountAction', [$request]);

        $this->uploadMedia( $acccapitalsubaccount, "image", true );
        $this->uploadMedia( $acccapitalsubaccount, "gallery" );
        $this->uploadMedia( $acccapitalsubaccount, "file" );

        return $this->transform($acccapitalsubaccount, AccCapitalSubAccountTransformer::class);
    }

    /**
     * @param DeleteAccCapitalSubAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCapitalSubAccount(DeleteAccCapitalSubAccountRequest $request)
    {
        Apiato::call('AccCapitalSubAccount@DeleteAccCapitalSubAccountAction', [$request]);

        return $this->noContent();
    }
}
