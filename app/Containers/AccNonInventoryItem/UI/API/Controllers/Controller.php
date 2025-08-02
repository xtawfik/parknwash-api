<?php

namespace App\Containers\AccNonInventoryItem\UI\API\Controllers;

use App\Containers\AccNonInventoryItem\UI\API\Requests\CreateAccNonInventoryItemRequest;
use App\Containers\AccNonInventoryItem\UI\API\Requests\DeleteAccNonInventoryItemRequest;
use App\Containers\AccNonInventoryItem\UI\API\Requests\GetAllAccNonInventoryItemsRequest;
use App\Containers\AccNonInventoryItem\UI\API\Requests\FindAccNonInventoryItemByIdRequest;
use App\Containers\AccNonInventoryItem\UI\API\Requests\UpdateAccNonInventoryItemRequest;
use App\Containers\AccNonInventoryItem\UI\API\Transformers\AccNonInventoryItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccNonInventoryItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccNonInventoryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccNonInventoryItem(CreateAccNonInventoryItemRequest $request)
    {
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@CreateAccNonInventoryItemAction', [$request]);

        $this->uploadMedia( $accnoninventoryitem, "image", true );
        $this->uploadMedia( $accnoninventoryitem, "gallery" );
        $this->uploadMedia( $accnoninventoryitem, "file" );

        return $this->created($this->transform($accnoninventoryitem, AccNonInventoryItemTransformer::class));
    }

    /**
     * @param FindAccNonInventoryItemByIdRequest $request
     * @return array
     */
    public function findAccNonInventoryItemById(FindAccNonInventoryItemByIdRequest $request)
    {
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@FindAccNonInventoryItemByIdAction', [$request]);

        return $this->transform($accnoninventoryitem, AccNonInventoryItemTransformer::class);
    }

    /**
     * @param GetAllAccNonInventoryItemsRequest $request
     * @return array
     */
    public function getAllAccNonInventoryItems(GetAllAccNonInventoryItemsRequest $request)
    {
        $accnoninventoryitems = Apiato::call('AccNonInventoryItem@GetAllAccNonInventoryItemsAction', [$request]);

        return $this->transform($accnoninventoryitems, AccNonInventoryItemTransformer::class);
    }

    /**
     * @param UpdateAccNonInventoryItemRequest $request
     * @return array
     */
    public function updateAccNonInventoryItem(UpdateAccNonInventoryItemRequest $request)
    {
        $accnoninventoryitem = Apiato::call('AccNonInventoryItem@UpdateAccNonInventoryItemAction', [$request]);

        $this->uploadMedia( $accnoninventoryitem, "image", true );
        $this->uploadMedia( $accnoninventoryitem, "gallery" );
        $this->uploadMedia( $accnoninventoryitem, "file" );

        return $this->transform($accnoninventoryitem, AccNonInventoryItemTransformer::class);
    }

    /**
     * @param DeleteAccNonInventoryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccNonInventoryItem(DeleteAccNonInventoryItemRequest $request)
    {
        Apiato::call('AccNonInventoryItem@DeleteAccNonInventoryItemAction', [$request]);

        return $this->noContent();
    }
}
