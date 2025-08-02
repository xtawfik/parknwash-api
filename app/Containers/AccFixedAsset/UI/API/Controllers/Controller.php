<?php

namespace App\Containers\AccFixedAsset\UI\API\Controllers;

use App\Containers\AccFixedAsset\UI\API\Requests\CreateAccFixedAssetRequest;
use App\Containers\AccFixedAsset\UI\API\Requests\DeleteAccFixedAssetRequest;
use App\Containers\AccFixedAsset\UI\API\Requests\GetAllAccFixedAssetsRequest;
use App\Containers\AccFixedAsset\UI\API\Requests\FindAccFixedAssetByIdRequest;
use App\Containers\AccFixedAsset\UI\API\Requests\UpdateAccFixedAssetRequest;
use App\Containers\AccFixedAsset\UI\API\Transformers\AccFixedAssetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccFixedAsset\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccFixedAssetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccFixedAsset(CreateAccFixedAssetRequest $request)
    {
        $accfixedasset = Apiato::call('AccFixedAsset@CreateAccFixedAssetAction', [$request]);

        $this->uploadMedia( $accfixedasset, "image", true );
        $this->uploadMedia( $accfixedasset, "gallery" );
        $this->uploadMedia( $accfixedasset, "file" );

        return $this->created($this->transform($accfixedasset, AccFixedAssetTransformer::class));
    }

    /**
     * @param FindAccFixedAssetByIdRequest $request
     * @return array
     */
    public function findAccFixedAssetById(FindAccFixedAssetByIdRequest $request)
    {
        $accfixedasset = Apiato::call('AccFixedAsset@FindAccFixedAssetByIdAction', [$request]);

        return $this->transform($accfixedasset, AccFixedAssetTransformer::class);
    }

    /**
     * @param GetAllAccFixedAssetsRequest $request
     * @return array
     */
    public function getAllAccFixedAssets(GetAllAccFixedAssetsRequest $request)
    {
        $accfixedassets = Apiato::call('AccFixedAsset@GetAllAccFixedAssetsAction', [$request]);

        return $this->transform($accfixedassets, AccFixedAssetTransformer::class);
    }

    /**
     * @param UpdateAccFixedAssetRequest $request
     * @return array
     */
    public function updateAccFixedAsset(UpdateAccFixedAssetRequest $request)
    {
        $accfixedasset = Apiato::call('AccFixedAsset@UpdateAccFixedAssetAction', [$request]);

        $this->uploadMedia( $accfixedasset, "image", true );
        $this->uploadMedia( $accfixedasset, "gallery" );
        $this->uploadMedia( $accfixedasset, "file" );

        return $this->transform($accfixedasset, AccFixedAssetTransformer::class);
    }

    /**
     * @param DeleteAccFixedAssetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccFixedAsset(DeleteAccFixedAssetRequest $request)
    {
        Apiato::call('AccFixedAsset@DeleteAccFixedAssetAction', [$request]);

        return $this->noContent();
    }
}
