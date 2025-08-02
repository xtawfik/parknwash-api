<?php

namespace App\Containers\FixedAssets\UI\API\Controllers;

use App\Containers\FixedAssets\UI\API\Requests\CreateFixedAssetsRequest;
use App\Containers\FixedAssets\UI\API\Requests\DeleteFixedAssetsRequest;
use App\Containers\FixedAssets\UI\API\Requests\GetAllFixedAssetsRequest;
use App\Containers\FixedAssets\UI\API\Requests\FindFixedAssetsByIdRequest;
use App\Containers\FixedAssets\UI\API\Requests\UpdateFixedAssetsRequest;
use App\Containers\FixedAssets\UI\API\Transformers\FixedAssetsTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\FixedAssets\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateFixedAssetsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFixedAssets(CreateFixedAssetsRequest $request)
    {
        $fixedassets = Apiato::call('FixedAssets@CreateFixedAssetsAction', [$request]);

        $this->uploadMedia( $fixedassets, "image", true );
        $this->uploadMedia( $fixedassets, "gallery" );
        $this->uploadMedia( $fixedassets, "file" );

        return $this->created($this->transform($fixedassets, FixedAssetsTransformer::class));
    }

    /**
     * @param FindFixedAssetsByIdRequest $request
     * @return array
     */
    public function findFixedAssetsById(FindFixedAssetsByIdRequest $request)
    {
        $fixedassets = Apiato::call('FixedAssets@FindFixedAssetsByIdAction', [$request]);

        return $this->transform($fixedassets, FixedAssetsTransformer::class);
    }

    /**
     * @param GetAllFixedAssetsRequest $request
     * @return array
     */
    public function getAllFixedAssets(GetAllFixedAssetsRequest $request)
    {
        $fixedassets = Apiato::call('FixedAssets@GetAllFixedAssetsAction', [$request]);

        return $this->transform($fixedassets, FixedAssetsTransformer::class);
    }

    /**
     * @param UpdateFixedAssetsRequest $request
     * @return array
     */
    public function updateFixedAssets(UpdateFixedAssetsRequest $request)
    {
        $fixedassets = Apiato::call('FixedAssets@UpdateFixedAssetsAction', [$request]);

        $this->uploadMedia( $fixedassets, "image", true );
        $this->uploadMedia( $fixedassets, "gallery" );
        $this->uploadMedia( $fixedassets, "file" );

        return $this->transform($fixedassets, FixedAssetsTransformer::class);
    }

    /**
     * @param DeleteFixedAssetsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFixedAssets(DeleteFixedAssetsRequest $request)
    {
        Apiato::call('FixedAssets@DeleteFixedAssetsAction', [$request]);

        return $this->noContent();
    }
}
