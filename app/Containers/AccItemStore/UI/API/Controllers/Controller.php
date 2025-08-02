<?php

namespace App\Containers\AccItemStore\UI\API\Controllers;

use App\Containers\AccItemStore\UI\API\Requests\CreateAccItemStoreRequest;
use App\Containers\AccItemStore\UI\API\Requests\DeleteAccItemStoreRequest;
use App\Containers\AccItemStore\UI\API\Requests\GetAllAccItemStoresRequest;
use App\Containers\AccItemStore\UI\API\Requests\FindAccItemStoreByIdRequest;
use App\Containers\AccItemStore\UI\API\Requests\UpdateAccItemStoreRequest;
use App\Containers\AccItemStore\UI\API\Transformers\AccItemStoreTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccItemStore\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccItemStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccItemStore(CreateAccItemStoreRequest $request)
    {
        $accitemstore = Apiato::call('AccItemStore@CreateAccItemStoreAction', [$request]);

        $this->uploadMedia( $accitemstore, "image", true );
        $this->uploadMedia( $accitemstore, "gallery" );
        $this->uploadMedia( $accitemstore, "file" );

        return $this->created($this->transform($accitemstore, AccItemStoreTransformer::class));
    }

    /**
     * @param FindAccItemStoreByIdRequest $request
     * @return array
     */
    public function findAccItemStoreById(FindAccItemStoreByIdRequest $request)
    {
        $accitemstore = Apiato::call('AccItemStore@FindAccItemStoreByIdAction', [$request]);

        return $this->transform($accitemstore, AccItemStoreTransformer::class);
    }

    /**
     * @param GetAllAccItemStoresRequest $request
     * @return array
     */
    public function getAllAccItemStores(GetAllAccItemStoresRequest $request)
    {
        $accitemstores = Apiato::call('AccItemStore@GetAllAccItemStoresAction', [$request]);

        return $this->transform($accitemstores, AccItemStoreTransformer::class);
    }

    /**
     * @param UpdateAccItemStoreRequest $request
     * @return array
     */
    public function updateAccItemStore(UpdateAccItemStoreRequest $request)
    {
        $accitemstore = Apiato::call('AccItemStore@UpdateAccItemStoreAction', [$request]);

        $this->uploadMedia( $accitemstore, "image", true );
        $this->uploadMedia( $accitemstore, "gallery" );
        $this->uploadMedia( $accitemstore, "file" );

        return $this->transform($accitemstore, AccItemStoreTransformer::class);
    }

    /**
     * @param DeleteAccItemStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccItemStore(DeleteAccItemStoreRequest $request)
    {
        Apiato::call('AccItemStore@DeleteAccItemStoreAction', [$request]);

        return $this->noContent();
    }
}
