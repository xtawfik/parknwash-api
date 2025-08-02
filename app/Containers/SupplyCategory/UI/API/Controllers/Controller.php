<?php

namespace App\Containers\SupplyCategory\UI\API\Controllers;

use App\Containers\SupplyCategory\UI\API\Requests\CreateSupplyCategoryRequest;
use App\Containers\SupplyCategory\UI\API\Requests\DeleteSupplyCategoryRequest;
use App\Containers\SupplyCategory\UI\API\Requests\GetAllSupplyCategoriesRequest;
use App\Containers\SupplyCategory\UI\API\Requests\FindSupplyCategoryByIdRequest;
use App\Containers\SupplyCategory\UI\API\Requests\UpdateSupplyCategoryRequest;
use App\Containers\SupplyCategory\UI\API\Transformers\SupplyCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\SupplyCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSupplyCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSupplyCategory(CreateSupplyCategoryRequest $request)
    {
        $supplycategory = Apiato::call('SupplyCategory@CreateSupplyCategoryAction', [$request]);

        $this->uploadMedia( $supplycategory, "image", true );
        $this->uploadMedia( $supplycategory, "gallery" );
        $this->uploadMedia( $supplycategory, "file" );

        return $this->created($this->transform($supplycategory, SupplyCategoryTransformer::class));
    }

    /**
     * @param FindSupplyCategoryByIdRequest $request
     * @return array
     */
    public function findSupplyCategoryById(FindSupplyCategoryByIdRequest $request)
    {
        $supplycategory = Apiato::call('SupplyCategory@FindSupplyCategoryByIdAction', [$request]);

        return $this->transform($supplycategory, SupplyCategoryTransformer::class);
    }

    /**
     * @param GetAllSupplyCategoriesRequest $request
     * @return array
     */
    public function getAllSupplyCategories(GetAllSupplyCategoriesRequest $request)
    {
        $supplycategories = Apiato::call('SupplyCategory@GetAllSupplyCategoriesAction', [$request]);

        return $this->transform($supplycategories, SupplyCategoryTransformer::class);
    }

    /**
     * @param UpdateSupplyCategoryRequest $request
     * @return array
     */
    public function updateSupplyCategory(UpdateSupplyCategoryRequest $request)
    {
        $supplycategory = Apiato::call('SupplyCategory@UpdateSupplyCategoryAction', [$request]);

        $this->uploadMedia( $supplycategory, "image", true );
        $this->uploadMedia( $supplycategory, "gallery" );
        $this->uploadMedia( $supplycategory, "file" );

        return $this->transform($supplycategory, SupplyCategoryTransformer::class);
    }

    /**
     * @param DeleteSupplyCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSupplyCategory(DeleteSupplyCategoryRequest $request)
    {
        Apiato::call('SupplyCategory@DeleteSupplyCategoryAction', [$request]);

        return $this->noContent();
    }
}
