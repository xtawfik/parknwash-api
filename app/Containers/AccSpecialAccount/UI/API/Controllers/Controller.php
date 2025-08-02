<?php

namespace App\Containers\AccSpecialAccount\UI\API\Controllers;

use App\Containers\AccSpecialAccount\UI\API\Requests\CreateAccSpecialAccountRequest;
use App\Containers\AccSpecialAccount\UI\API\Requests\DeleteAccSpecialAccountRequest;
use App\Containers\AccSpecialAccount\UI\API\Requests\GetAllAccSpecialAccountsRequest;
use App\Containers\AccSpecialAccount\UI\API\Requests\FindAccSpecialAccountByIdRequest;
use App\Containers\AccSpecialAccount\UI\API\Requests\UpdateAccSpecialAccountRequest;
use App\Containers\AccSpecialAccount\UI\API\Transformers\AccSpecialAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccSpecialAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccSpecialAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccSpecialAccount(CreateAccSpecialAccountRequest $request)
    {
        $accspecialaccount = Apiato::call('AccSpecialAccount@CreateAccSpecialAccountAction', [$request]);

        $this->uploadMedia( $accspecialaccount, "image", true );
        $this->uploadMedia( $accspecialaccount, "gallery" );
        $this->uploadMedia( $accspecialaccount, "file" );

        return $this->created($this->transform($accspecialaccount, AccSpecialAccountTransformer::class));
    }

    /**
     * @param FindAccSpecialAccountByIdRequest $request
     * @return array
     */
    public function findAccSpecialAccountById(FindAccSpecialAccountByIdRequest $request)
    {
        $accspecialaccount = Apiato::call('AccSpecialAccount@FindAccSpecialAccountByIdAction', [$request]);

        return $this->transform($accspecialaccount, AccSpecialAccountTransformer::class);
    }

    /**
     * @param GetAllAccSpecialAccountsRequest $request
     * @return array
     */
    public function getAllAccSpecialAccounts(GetAllAccSpecialAccountsRequest $request)
    {
        $accspecialaccounts = Apiato::call('AccSpecialAccount@GetAllAccSpecialAccountsAction', [$request]);

        return $this->transform($accspecialaccounts, AccSpecialAccountTransformer::class);
    }

    /**
     * @param UpdateAccSpecialAccountRequest $request
     * @return array
     */
    public function updateAccSpecialAccount(UpdateAccSpecialAccountRequest $request)
    {
        $accspecialaccount = Apiato::call('AccSpecialAccount@UpdateAccSpecialAccountAction', [$request]);

        $this->uploadMedia( $accspecialaccount, "image", true );
        $this->uploadMedia( $accspecialaccount, "gallery" );
        $this->uploadMedia( $accspecialaccount, "file" );

        return $this->transform($accspecialaccount, AccSpecialAccountTransformer::class);
    }

    /**
     * @param DeleteAccSpecialAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccSpecialAccount(DeleteAccSpecialAccountRequest $request)
    {
        Apiato::call('AccSpecialAccount@DeleteAccSpecialAccountAction', [$request]);

        return $this->noContent();
    }
}
