<?php

namespace App\Containers\AccInventoryItem\UI\API\Controllers;

use App\Containers\AccInventoryItem\UI\API\Requests\CreateAccInventoryItemRequest;
use App\Containers\AccInventoryItem\UI\API\Requests\DeleteAccInventoryItemRequest;
use App\Containers\AccInventoryItem\UI\API\Requests\GetAllAccInventoryItemsRequest;
use App\Containers\AccInventoryItem\UI\API\Requests\FindAccInventoryItemByIdRequest;
use App\Containers\AccInventoryItem\UI\API\Requests\UpdateAccInventoryItemRequest;
use App\Containers\AccInventoryItem\UI\API\Transformers\AccInventoryItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventoryItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventoryItem(CreateAccInventoryItemRequest $request)
    {
        $accinventoryitem = Apiato::call('AccInventoryItem@CreateAccInventoryItemAction', [$request]);

        $this->uploadMedia( $accinventoryitem, "image", true );
        $this->uploadMedia( $accinventoryitem, "gallery" );
        $this->uploadMedia( $accinventoryitem, "file" );

        return $this->created($this->transform($accinventoryitem, AccInventoryItemTransformer::class));
    }

    /**
     * @param FindAccInventoryItemByIdRequest $request
     * @return array
     */
    public function findAccInventoryItemById(FindAccInventoryItemByIdRequest $request)
    {
        $accinventoryitem = Apiato::call('AccInventoryItem@FindAccInventoryItemByIdAction', [$request]);

        return $this->transform($accinventoryitem, AccInventoryItemTransformer::class);
    }

    /**
     * @param GetAllAccInventoryItemsRequest $request
     * @return array
     */
    public function getAllAccInventoryItems(GetAllAccInventoryItemsRequest $request)
    {
        $accinventoryitems = Apiato::call('AccInventoryItem@GetAllAccInventoryItemsAction', [$request]);

        return $this->transform($accinventoryitems, AccInventoryItemTransformer::class);
    }

    /**
     * @param UpdateAccInventoryItemRequest $request
     * @return array
     */
    public function updateAccInventoryItem(UpdateAccInventoryItemRequest $request)
    {
        $accinventoryitem = Apiato::call('AccInventoryItem@UpdateAccInventoryItemAction', [$request]);

        $this->uploadMedia( $accinventoryitem, "image", true );
        $this->uploadMedia( $accinventoryitem, "gallery" );
        $this->uploadMedia( $accinventoryitem, "file" );

        return $this->transform($accinventoryitem, AccInventoryItemTransformer::class);
    }

    /**
     * @param DeleteAccInventoryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventoryItem(DeleteAccInventoryItemRequest $request)
    {
        Apiato::call('AccInventoryItem@DeleteAccInventoryItemAction', [$request]);

        return $this->noContent();
    }
}
