<?php

namespace App\Containers\RequestItem\UI\API\Controllers;

use App\Containers\RequestItem\UI\API\Requests\CreateRequestItemRequest;
use App\Containers\RequestItem\UI\API\Requests\DeleteRequestItemRequest;
use App\Containers\RequestItem\UI\API\Requests\GetAllRequestItemsRequest;
use App\Containers\RequestItem\UI\API\Requests\FindRequestItemByIdRequest;
use App\Containers\RequestItem\UI\API\Requests\UpdateRequestItemRequest;
use App\Containers\RequestItem\UI\API\Transformers\RequestItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\RequestItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateRequestItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRequestItem(CreateRequestItemRequest $request)
    {
        $requestitem = Apiato::call('RequestItem@CreateRequestItemAction', [$request]);

        $this->uploadMedia( $requestitem, "image", true );
        $this->uploadMedia( $requestitem, "gallery" );
        $this->uploadMedia( $requestitem, "file" );

        return $this->created($this->transform($requestitem, RequestItemTransformer::class));
    }

    /**
     * @param FindRequestItemByIdRequest $request
     * @return array
     */
    public function findRequestItemById(FindRequestItemByIdRequest $request)
    {
        $requestitem = Apiato::call('RequestItem@FindRequestItemByIdAction', [$request]);

        return $this->transform($requestitem, RequestItemTransformer::class);
    }

    /**
     * @param GetAllRequestItemsRequest $request
     * @return array
     */
    public function getAllRequestItems(GetAllRequestItemsRequest $request)
    {
        $requestitems = Apiato::call('RequestItem@GetAllRequestItemsAction', [$request]);

        return $this->transform($requestitems, RequestItemTransformer::class);
    }

    /**
     * @param UpdateRequestItemRequest $request
     * @return array
     */
    public function updateRequestItem(UpdateRequestItemRequest $request)
    {
        $requestitem = Apiato::call('RequestItem@UpdateRequestItemAction', [$request]);

        $this->uploadMedia( $requestitem, "image", true );
        $this->uploadMedia( $requestitem, "gallery" );
        $this->uploadMedia( $requestitem, "file" );

        return $this->transform($requestitem, RequestItemTransformer::class);
    }

    /**
     * @param DeleteRequestItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRequestItem(DeleteRequestItemRequest $request)
    {
        Apiato::call('RequestItem@DeleteRequestItemAction', [$request]);

        return $this->noContent();
    }
}
