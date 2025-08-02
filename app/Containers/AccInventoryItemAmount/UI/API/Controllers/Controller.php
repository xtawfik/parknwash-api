<?php

namespace App\Containers\AccInventoryItemAmount\UI\API\Controllers;

use App\Containers\AccInventoryItemAmount\UI\API\Requests\CreateAccInventoryItemAmountRequest;
use App\Containers\AccInventoryItemAmount\UI\API\Requests\DeleteAccInventoryItemAmountRequest;
use App\Containers\AccInventoryItemAmount\UI\API\Requests\GetAllAccInventoryItemAmountsRequest;
use App\Containers\AccInventoryItemAmount\UI\API\Requests\FindAccInventoryItemAmountByIdRequest;
use App\Containers\AccInventoryItemAmount\UI\API\Requests\UpdateAccInventoryItemAmountRequest;
use App\Containers\AccInventoryItemAmount\UI\API\Transformers\AccInventoryItemAmountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventoryItemAmount\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryItemAmountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventoryItemAmount(CreateAccInventoryItemAmountRequest $request)
    {
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@CreateAccInventoryItemAmountAction', [$request]);

        $this->uploadMedia( $accinventoryitemamount, "image", true );
        $this->uploadMedia( $accinventoryitemamount, "gallery" );
        $this->uploadMedia( $accinventoryitemamount, "file" );

        return $this->created($this->transform($accinventoryitemamount, AccInventoryItemAmountTransformer::class));
    }

    /**
     * @param FindAccInventoryItemAmountByIdRequest $request
     * @return array
     */
    public function findAccInventoryItemAmountById(FindAccInventoryItemAmountByIdRequest $request)
    {
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@FindAccInventoryItemAmountByIdAction', [$request]);

        return $this->transform($accinventoryitemamount, AccInventoryItemAmountTransformer::class);
    }

    /**
     * @param GetAllAccInventoryItemAmountsRequest $request
     * @return array
     */
    public function getAllAccInventoryItemAmounts(GetAllAccInventoryItemAmountsRequest $request)
    {
        $accinventoryitemamounts = Apiato::call('AccInventoryItemAmount@GetAllAccInventoryItemAmountsAction', [$request]);

        return $this->transform($accinventoryitemamounts, AccInventoryItemAmountTransformer::class);
    }

    /**
     * @param UpdateAccInventoryItemAmountRequest $request
     * @return array
     */
    public function updateAccInventoryItemAmount(UpdateAccInventoryItemAmountRequest $request)
    {
        $accinventoryitemamount = Apiato::call('AccInventoryItemAmount@UpdateAccInventoryItemAmountAction', [$request]);

        $this->uploadMedia( $accinventoryitemamount, "image", true );
        $this->uploadMedia( $accinventoryitemamount, "gallery" );
        $this->uploadMedia( $accinventoryitemamount, "file" );

        return $this->transform($accinventoryitemamount, AccInventoryItemAmountTransformer::class);
    }

    /**
     * @param DeleteAccInventoryItemAmountRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventoryItemAmount(DeleteAccInventoryItemAmountRequest $request)
    {
        Apiato::call('AccInventoryItemAmount@DeleteAccInventoryItemAmountAction', [$request]);

        return $this->noContent();
    }
}
