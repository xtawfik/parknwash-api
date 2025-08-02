<?php

namespace App\Containers\AccAssetEntry\UI\API\Controllers;

use App\Containers\AccAssetEntry\UI\API\Requests\CreateAccAssetEntryRequest;
use App\Containers\AccAssetEntry\UI\API\Requests\DeleteAccAssetEntryRequest;
use App\Containers\AccAssetEntry\UI\API\Requests\GetAllAccAssetEntriesRequest;
use App\Containers\AccAssetEntry\UI\API\Requests\FindAccAssetEntryByIdRequest;
use App\Containers\AccAssetEntry\UI\API\Requests\UpdateAccAssetEntryRequest;
use App\Containers\AccAssetEntry\UI\API\Transformers\AccAssetEntryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccAssetEntry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccAssetEntryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccAssetEntry(CreateAccAssetEntryRequest $request)
    {
        $accassetentry = Apiato::call('AccAssetEntry@CreateAccAssetEntryAction', [$request]);

        $this->uploadMedia( $accassetentry, "image", true );
        $this->uploadMedia( $accassetentry, "gallery" );
        $this->uploadMedia( $accassetentry, "file" );

        return $this->created($this->transform($accassetentry, AccAssetEntryTransformer::class));
    }

    /**
     * @param FindAccAssetEntryByIdRequest $request
     * @return array
     */
    public function findAccAssetEntryById(FindAccAssetEntryByIdRequest $request)
    {
        $accassetentry = Apiato::call('AccAssetEntry@FindAccAssetEntryByIdAction', [$request]);

        return $this->transform($accassetentry, AccAssetEntryTransformer::class);
    }

    /**
     * @param GetAllAccAssetEntriesRequest $request
     * @return array
     */
    public function getAllAccAssetEntries(GetAllAccAssetEntriesRequest $request)
    {
        $accassetentries = Apiato::call('AccAssetEntry@GetAllAccAssetEntriesAction', [$request]);

        return $this->transform($accassetentries, AccAssetEntryTransformer::class);
    }

    /**
     * @param UpdateAccAssetEntryRequest $request
     * @return array
     */
    public function updateAccAssetEntry(UpdateAccAssetEntryRequest $request)
    {
        $accassetentry = Apiato::call('AccAssetEntry@UpdateAccAssetEntryAction', [$request]);

        $this->uploadMedia( $accassetentry, "image", true );
        $this->uploadMedia( $accassetentry, "gallery" );
        $this->uploadMedia( $accassetentry, "file" );

        return $this->transform($accassetentry, AccAssetEntryTransformer::class);
    }

    /**
     * @param DeleteAccAssetEntryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccAssetEntry(DeleteAccAssetEntryRequest $request)
    {
        Apiato::call('AccAssetEntry@DeleteAccAssetEntryAction', [$request]);

        return $this->noContent();
    }
}
