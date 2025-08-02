<?php

namespace App\Containers\AccPayslipItemCategory\UI\API\Controllers;

use App\Containers\AccPayslipItemCategory\UI\API\Requests\CreateAccPayslipItemCategoryRequest;
use App\Containers\AccPayslipItemCategory\UI\API\Requests\DeleteAccPayslipItemCategoryRequest;
use App\Containers\AccPayslipItemCategory\UI\API\Requests\GetAllAccPayslipItemCategoriesRequest;
use App\Containers\AccPayslipItemCategory\UI\API\Requests\FindAccPayslipItemCategoryByIdRequest;
use App\Containers\AccPayslipItemCategory\UI\API\Requests\UpdateAccPayslipItemCategoryRequest;
use App\Containers\AccPayslipItemCategory\UI\API\Transformers\AccPayslipItemCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslipItemCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipItemCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslipItemCategory(CreateAccPayslipItemCategoryRequest $request)
    {
        $accpayslipitemcategory = Apiato::call('AccPayslipItemCategory@CreateAccPayslipItemCategoryAction', [$request]);

        $this->uploadMedia( $accpayslipitemcategory, "image", true );
        $this->uploadMedia( $accpayslipitemcategory, "gallery" );
        $this->uploadMedia( $accpayslipitemcategory, "file" );

        return $this->created($this->transform($accpayslipitemcategory, AccPayslipItemCategoryTransformer::class));
    }

    /**
     * @param FindAccPayslipItemCategoryByIdRequest $request
     * @return array
     */
    public function findAccPayslipItemCategoryById(FindAccPayslipItemCategoryByIdRequest $request)
    {
        $accpayslipitemcategory = Apiato::call('AccPayslipItemCategory@FindAccPayslipItemCategoryByIdAction', [$request]);

        return $this->transform($accpayslipitemcategory, AccPayslipItemCategoryTransformer::class);
    }

    /**
     * @param GetAllAccPayslipItemCategoriesRequest $request
     * @return array
     */
    public function getAllAccPayslipItemCategories(GetAllAccPayslipItemCategoriesRequest $request)
    {
        $accpayslipitemcategories = Apiato::call('AccPayslipItemCategory@GetAllAccPayslipItemCategoriesAction', [$request]);

        return $this->transform($accpayslipitemcategories, AccPayslipItemCategoryTransformer::class);
    }

    /**
     * @param UpdateAccPayslipItemCategoryRequest $request
     * @return array
     */
    public function updateAccPayslipItemCategory(UpdateAccPayslipItemCategoryRequest $request)
    {
        $accpayslipitemcategory = Apiato::call('AccPayslipItemCategory@UpdateAccPayslipItemCategoryAction', [$request]);

        $this->uploadMedia( $accpayslipitemcategory, "image", true );
        $this->uploadMedia( $accpayslipitemcategory, "gallery" );
        $this->uploadMedia( $accpayslipitemcategory, "file" );

        return $this->transform($accpayslipitemcategory, AccPayslipItemCategoryTransformer::class);
    }

    /**
     * @param DeleteAccPayslipItemCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslipItemCategory(DeleteAccPayslipItemCategoryRequest $request)
    {
        Apiato::call('AccPayslipItemCategory@DeleteAccPayslipItemCategoryAction', [$request]);

        return $this->noContent();
    }
}
