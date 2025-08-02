<?php

namespace App\Containers\AssetCategory\UI\API\Controllers;

use App\Containers\AssetCategory\UI\API\Requests\CreateAssetCategoryRequest;
use App\Containers\AssetCategory\UI\API\Requests\DeleteAssetCategoryRequest;
use App\Containers\AssetCategory\UI\API\Requests\GetAllAssetCategoriesRequest;
use App\Containers\AssetCategory\UI\API\Requests\FindAssetCategoryByIdRequest;
use App\Containers\AssetCategory\UI\API\Requests\UpdateAssetCategoryRequest;
use App\Containers\AssetCategory\UI\API\Transformers\AssetCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AssetCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAssetCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAssetCategory(CreateAssetCategoryRequest $request)
    {
        $assetcategory = Apiato::call('AssetCategory@CreateAssetCategoryAction', [$request]);

        $this->uploadMedia( $assetcategory, "image", true );
        $this->uploadMedia( $assetcategory, "gallery" );
        $this->uploadMedia( $assetcategory, "file" );

        return $this->created($this->transform($assetcategory, AssetCategoryTransformer::class));
    }

    /**
     * @param FindAssetCategoryByIdRequest $request
     * @return array
     */
    public function findAssetCategoryById(FindAssetCategoryByIdRequest $request)
    {
        $assetcategory = Apiato::call('AssetCategory@FindAssetCategoryByIdAction', [$request]);

        return $this->transform($assetcategory, AssetCategoryTransformer::class);
    }

    /**
     * @param GetAllAssetCategoriesRequest $request
     * @return array
     */
    public function getAllAssetCategories(GetAllAssetCategoriesRequest $request)
    {
        $assetcategories = Apiato::call('AssetCategory@GetAllAssetCategoriesAction', [$request]);

        return $this->transform($assetcategories, AssetCategoryTransformer::class);
    }

    /**
     * @param UpdateAssetCategoryRequest $request
     * @return array
     */
    public function updateAssetCategory(UpdateAssetCategoryRequest $request)
    {
        $assetcategory = Apiato::call('AssetCategory@UpdateAssetCategoryAction', [$request]);

        $this->uploadMedia( $assetcategory, "image", true );
        $this->uploadMedia( $assetcategory, "gallery" );
        $this->uploadMedia( $assetcategory, "file" );

        return $this->transform($assetcategory, AssetCategoryTransformer::class);
    }

    /**
     * @param DeleteAssetCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAssetCategory(DeleteAssetCategoryRequest $request)
    {
        Apiato::call('AssetCategory@DeleteAssetCategoryAction', [$request]);

        return $this->noContent();
    }
}
