<?php

namespace App\Containers\AccBalanceSheetAccount\UI\API\Controllers;

use App\Containers\AccBalanceSheetAccount\UI\API\Requests\CreateAccBalanceSheetAccountRequest;
use App\Containers\AccBalanceSheetAccount\UI\API\Requests\DeleteAccBalanceSheetAccountRequest;
use App\Containers\AccBalanceSheetAccount\UI\API\Requests\GetAllAccBalanceSheetAccountsRequest;
use App\Containers\AccBalanceSheetAccount\UI\API\Requests\FindAccBalanceSheetAccountByIdRequest;
use App\Containers\AccBalanceSheetAccount\UI\API\Requests\UpdateAccBalanceSheetAccountRequest;
use App\Containers\AccBalanceSheetAccount\UI\API\Transformers\AccBalanceSheetAccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBalanceSheetAccount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBalanceSheetAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBalanceSheetAccount(CreateAccBalanceSheetAccountRequest $request)
    {
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@CreateAccBalanceSheetAccountAction', [$request]);

        $this->uploadMedia( $accbalancesheetaccount, "image", true );
        $this->uploadMedia( $accbalancesheetaccount, "gallery" );
        $this->uploadMedia( $accbalancesheetaccount, "file" );

        return $this->created($this->transform($accbalancesheetaccount, AccBalanceSheetAccountTransformer::class));
    }

    /**
     * @param FindAccBalanceSheetAccountByIdRequest $request
     * @return array
     */
    public function findAccBalanceSheetAccountById(FindAccBalanceSheetAccountByIdRequest $request)
    {
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@FindAccBalanceSheetAccountByIdAction', [$request]);

        return $this->transform($accbalancesheetaccount, AccBalanceSheetAccountTransformer::class);
    }

    /**
     * @param GetAllAccBalanceSheetAccountsRequest $request
     * @return array
     */
    public function getAllAccBalanceSheetAccounts(GetAllAccBalanceSheetAccountsRequest $request)
    {
        $accbalancesheetaccounts = Apiato::call('AccBalanceSheetAccount@GetAllAccBalanceSheetAccountsAction', [$request]);

        return $this->transform($accbalancesheetaccounts, AccBalanceSheetAccountTransformer::class);
    }

    /**
     * @param UpdateAccBalanceSheetAccountRequest $request
     * @return array
     */
    public function updateAccBalanceSheetAccount(UpdateAccBalanceSheetAccountRequest $request)
    {
        $accbalancesheetaccount = Apiato::call('AccBalanceSheetAccount@UpdateAccBalanceSheetAccountAction', [$request]);

        $this->uploadMedia( $accbalancesheetaccount, "image", true );
        $this->uploadMedia( $accbalancesheetaccount, "gallery" );
        $this->uploadMedia( $accbalancesheetaccount, "file" );

        return $this->transform($accbalancesheetaccount, AccBalanceSheetAccountTransformer::class);
    }

    /**
     * @param DeleteAccBalanceSheetAccountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBalanceSheetAccount(DeleteAccBalanceSheetAccountRequest $request)
    {
        Apiato::call('AccBalanceSheetAccount@DeleteAccBalanceSheetAccountAction', [$request]);

        return $this->noContent();
    }
}
