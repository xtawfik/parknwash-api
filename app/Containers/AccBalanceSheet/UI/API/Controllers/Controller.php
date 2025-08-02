<?php

namespace App\Containers\AccBalanceSheet\UI\API\Controllers;

use App\Containers\AccBalanceSheet\UI\API\Requests\CreateAccBalanceSheetRequest;
use App\Containers\AccBalanceSheet\UI\API\Requests\DeleteAccBalanceSheetRequest;
use App\Containers\AccBalanceSheet\UI\API\Requests\GetAllAccBalanceSheetsRequest;
use App\Containers\AccBalanceSheet\UI\API\Requests\FindAccBalanceSheetByIdRequest;
use App\Containers\AccBalanceSheet\UI\API\Requests\UpdateAccBalanceSheetRequest;
use App\Containers\AccBalanceSheet\UI\API\Transformers\AccBalanceSheetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBalanceSheet\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBalanceSheetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBalanceSheet(CreateAccBalanceSheetRequest $request)
    {
        $accbalancesheet = Apiato::call('AccBalanceSheet@CreateAccBalanceSheetAction', [$request]);

        $this->uploadMedia( $accbalancesheet, "image", true );
        $this->uploadMedia( $accbalancesheet, "gallery" );
        $this->uploadMedia( $accbalancesheet, "file" );

        return $this->created($this->transform($accbalancesheet, AccBalanceSheetTransformer::class));
    }

    /**
     * @param FindAccBalanceSheetByIdRequest $request
     * @return array
     */
    public function findAccBalanceSheetById(FindAccBalanceSheetByIdRequest $request)
    {
        $accbalancesheet = Apiato::call('AccBalanceSheet@FindAccBalanceSheetByIdAction', [$request]);

        return $this->transform($accbalancesheet, AccBalanceSheetTransformer::class);
    }

    /**
     * @param GetAllAccBalanceSheetsRequest $request
     * @return array
     */
    public function getAllAccBalanceSheets(GetAllAccBalanceSheetsRequest $request)
    {
        $accbalancesheets = Apiato::call('AccBalanceSheet@GetAllAccBalanceSheetsAction', [$request]);

        return $this->transform($accbalancesheets, AccBalanceSheetTransformer::class);
    }

    /**
     * @param UpdateAccBalanceSheetRequest $request
     * @return array
     */
    public function updateAccBalanceSheet(UpdateAccBalanceSheetRequest $request)
    {
        $accbalancesheet = Apiato::call('AccBalanceSheet@UpdateAccBalanceSheetAction', [$request]);

        $this->uploadMedia( $accbalancesheet, "image", true );
        $this->uploadMedia( $accbalancesheet, "gallery" );
        $this->uploadMedia( $accbalancesheet, "file" );

        return $this->transform($accbalancesheet, AccBalanceSheetTransformer::class);
    }

    /**
     * @param DeleteAccBalanceSheetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBalanceSheet(DeleteAccBalanceSheetRequest $request)
    {
        Apiato::call('AccBalanceSheet@DeleteAccBalanceSheetAction', [$request]);

        return $this->noContent();
    }
}
