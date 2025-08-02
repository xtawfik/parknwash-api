<?php

namespace App\Containers\AccIntangibleAsset\UI\API\Controllers;

use App\Containers\AccIntangibleAsset\UI\API\Requests\CreateAccIntangibleAssetRequest;
use App\Containers\AccIntangibleAsset\UI\API\Requests\DeleteAccIntangibleAssetRequest;
use App\Containers\AccIntangibleAsset\UI\API\Requests\GetAllAccIntangibleAssetsRequest;
use App\Containers\AccIntangibleAsset\UI\API\Requests\FindAccIntangibleAssetByIdRequest;
use App\Containers\AccIntangibleAsset\UI\API\Requests\UpdateAccIntangibleAssetRequest;
use App\Containers\AccIntangibleAsset\UI\API\Transformers\AccIntangibleAssetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccIntangibleAsset\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccIntangibleAssetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccIntangibleAsset(CreateAccIntangibleAssetRequest $request)
    {
        $accintangibleasset = Apiato::call('AccIntangibleAsset@CreateAccIntangibleAssetAction', [$request]);

        $this->uploadMedia( $accintangibleasset, "image", true );
        $this->uploadMedia( $accintangibleasset, "gallery" );
        $this->uploadMedia( $accintangibleasset, "file" );

        return $this->created($this->transform($accintangibleasset, AccIntangibleAssetTransformer::class));
    }

    /**
     * @param FindAccIntangibleAssetByIdRequest $request
     * @return array
     */
    public function findAccIntangibleAssetById(FindAccIntangibleAssetByIdRequest $request)
    {
        $accintangibleasset = Apiato::call('AccIntangibleAsset@FindAccIntangibleAssetByIdAction', [$request]);

        return $this->transform($accintangibleasset, AccIntangibleAssetTransformer::class);
    }

    /**
     * @param GetAllAccIntangibleAssetsRequest $request
     * @return array
     */
    public function getAllAccIntangibleAssets(GetAllAccIntangibleAssetsRequest $request)
    {
        $accintangibleassets = Apiato::call('AccIntangibleAsset@GetAllAccIntangibleAssetsAction', [$request]);

        return $this->transform($accintangibleassets, AccIntangibleAssetTransformer::class);
    }

    /**
     * @param UpdateAccIntangibleAssetRequest $request
     * @return array
     */
    public function updateAccIntangibleAsset(UpdateAccIntangibleAssetRequest $request)
    {
        $accintangibleasset = Apiato::call('AccIntangibleAsset@UpdateAccIntangibleAssetAction', [$request]);

        $this->uploadMedia( $accintangibleasset, "image", true );
        $this->uploadMedia( $accintangibleasset, "gallery" );
        $this->uploadMedia( $accintangibleasset, "file" );

        return $this->transform($accintangibleasset, AccIntangibleAssetTransformer::class);
    }

    /**
     * @param DeleteAccIntangibleAssetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccIntangibleAsset(DeleteAccIntangibleAssetRequest $request)
    {
        Apiato::call('AccIntangibleAsset@DeleteAccIntangibleAssetAction', [$request]);

        return $this->noContent();
    }
}
