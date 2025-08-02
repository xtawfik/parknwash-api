<?php

namespace App\Containers\AccAssetEntryItem\UI\API\Controllers;

use App\Containers\AccAssetEntryItem\UI\API\Requests\CreateAccAssetEntryItemRequest;
use App\Containers\AccAssetEntryItem\UI\API\Requests\DeleteAccAssetEntryItemRequest;
use App\Containers\AccAssetEntryItem\UI\API\Requests\GetAllAccAssetEntryItemsRequest;
use App\Containers\AccAssetEntryItem\UI\API\Requests\FindAccAssetEntryItemByIdRequest;
use App\Containers\AccAssetEntryItem\UI\API\Requests\UpdateAccAssetEntryItemRequest;
use App\Containers\AccAssetEntryItem\UI\API\Transformers\AccAssetEntryItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccAssetEntryItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccAssetEntryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccAssetEntryItem(CreateAccAssetEntryItemRequest $request)
    {
        $accassetentryitem = Apiato::call('AccAssetEntryItem@CreateAccAssetEntryItemAction', [$request]);

        $this->uploadMedia( $accassetentryitem, "image", true );
        $this->uploadMedia( $accassetentryitem, "gallery" );
        $this->uploadMedia( $accassetentryitem, "file" );

        return $this->created($this->transform($accassetentryitem, AccAssetEntryItemTransformer::class));
    }

    /**
     * @param FindAccAssetEntryItemByIdRequest $request
     * @return array
     */
    public function findAccAssetEntryItemById(FindAccAssetEntryItemByIdRequest $request)
    {
        $accassetentryitem = Apiato::call('AccAssetEntryItem@FindAccAssetEntryItemByIdAction', [$request]);

        return $this->transform($accassetentryitem, AccAssetEntryItemTransformer::class);
    }

    /**
     * @param GetAllAccAssetEntryItemsRequest $request
     * @return array
     */
    public function getAllAccAssetEntryItems(GetAllAccAssetEntryItemsRequest $request)
    {
        $accassetentryitems = Apiato::call('AccAssetEntryItem@GetAllAccAssetEntryItemsAction', [$request]);

        return $this->transform($accassetentryitems, AccAssetEntryItemTransformer::class);
    }

    /**
     * @param UpdateAccAssetEntryItemRequest $request
     * @return array
     */
    public function updateAccAssetEntryItem(UpdateAccAssetEntryItemRequest $request)
    {
        $accassetentryitem = Apiato::call('AccAssetEntryItem@UpdateAccAssetEntryItemAction', [$request]);

        $this->uploadMedia( $accassetentryitem, "image", true );
        $this->uploadMedia( $accassetentryitem, "gallery" );
        $this->uploadMedia( $accassetentryitem, "file" );

        return $this->transform($accassetentryitem, AccAssetEntryItemTransformer::class);
    }

    /**
     * @param DeleteAccAssetEntryItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccAssetEntryItem(DeleteAccAssetEntryItemRequest $request)
    {
        Apiato::call('AccAssetEntryItem@DeleteAccAssetEntryItemAction', [$request]);

        return $this->noContent();
    }
}
