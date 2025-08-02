<?php

namespace App\Containers\AccItem\UI\API\Controllers;

use App\Containers\AccItem\UI\API\Requests\CreateAccItemRequest;
use App\Containers\AccItem\UI\API\Requests\DeleteAccItemRequest;
use App\Containers\AccItem\UI\API\Requests\GetAllAccItemsRequest;
use App\Containers\AccItem\UI\API\Requests\FindAccItemByIdRequest;
use App\Containers\AccItem\UI\API\Requests\UpdateAccItemRequest;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccItem(CreateAccItemRequest $request)
    {
        $accitem = Apiato::call('AccItem@CreateAccItemAction', [$request]);

        $this->uploadMedia( $accitem, "image", true );
        $this->uploadMedia( $accitem, "gallery" );
        $this->uploadMedia( $accitem, "file" );

        return $this->created($this->transform($accitem, AccItemTransformer::class));
    }

    /**
     * @param FindAccItemByIdRequest $request
     * @return array
     */
    public function findAccItemById(FindAccItemByIdRequest $request)
    {
        $accitem = Apiato::call('AccItem@FindAccItemByIdAction', [$request]);

        return $this->transform($accitem, AccItemTransformer::class);
    }

    /**
     * @param GetAllAccItemsRequest $request
     * @return array
     */
    public function getAllAccItems(GetAllAccItemsRequest $request)
    {
        $accitems = Apiato::call('AccItem@GetAllAccItemsAction', [$request]);

        return $this->transform($accitems, AccItemTransformer::class);
    }

    /**
     * @param UpdateAccItemRequest $request
     * @return array
     */
    public function updateAccItem(UpdateAccItemRequest $request)
    {
        $accitem = Apiato::call('AccItem@UpdateAccItemAction', [$request]);

        $this->uploadMedia( $accitem, "image", true );
        $this->uploadMedia( $accitem, "gallery" );
        $this->uploadMedia( $accitem, "file" );

        return $this->transform($accitem, AccItemTransformer::class);
    }

    /**
     * @param DeleteAccItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccItem(DeleteAccItemRequest $request)
    {
        Apiato::call('AccItem@DeleteAccItemAction', [$request]);

        return $this->noContent();
    }
}
