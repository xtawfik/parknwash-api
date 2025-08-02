<?php

namespace App\Containers\AccReportingCategory\UI\API\Controllers;

use App\Containers\AccReportingCategory\UI\API\Requests\CreateAccReportingCategoryRequest;
use App\Containers\AccReportingCategory\UI\API\Requests\DeleteAccReportingCategoryRequest;
use App\Containers\AccReportingCategory\UI\API\Requests\GetAllAccReportingCategoriesRequest;
use App\Containers\AccReportingCategory\UI\API\Requests\FindAccReportingCategoryByIdRequest;
use App\Containers\AccReportingCategory\UI\API\Requests\UpdateAccReportingCategoryRequest;
use App\Containers\AccReportingCategory\UI\API\Transformers\AccReportingCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccReportingCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccReportingCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccReportingCategory(CreateAccReportingCategoryRequest $request)
    {
        $accreportingcategory = Apiato::call('AccReportingCategory@CreateAccReportingCategoryAction', [$request]);

        $this->uploadMedia( $accreportingcategory, "image", true );
        $this->uploadMedia( $accreportingcategory, "gallery" );
        $this->uploadMedia( $accreportingcategory, "file" );

        return $this->created($this->transform($accreportingcategory, AccReportingCategoryTransformer::class));
    }

    /**
     * @param FindAccReportingCategoryByIdRequest $request
     * @return array
     */
    public function findAccReportingCategoryById(FindAccReportingCategoryByIdRequest $request)
    {
        $accreportingcategory = Apiato::call('AccReportingCategory@FindAccReportingCategoryByIdAction', [$request]);

        return $this->transform($accreportingcategory, AccReportingCategoryTransformer::class);
    }

    /**
     * @param GetAllAccReportingCategoriesRequest $request
     * @return array
     */
    public function getAllAccReportingCategories(GetAllAccReportingCategoriesRequest $request)
    {
        $accreportingcategories = Apiato::call('AccReportingCategory@GetAllAccReportingCategoriesAction', [$request]);

        return $this->transform($accreportingcategories, AccReportingCategoryTransformer::class);
    }

    /**
     * @param UpdateAccReportingCategoryRequest $request
     * @return array
     */
    public function updateAccReportingCategory(UpdateAccReportingCategoryRequest $request)
    {
        $accreportingcategory = Apiato::call('AccReportingCategory@UpdateAccReportingCategoryAction', [$request]);

        $this->uploadMedia( $accreportingcategory, "image", true );
        $this->uploadMedia( $accreportingcategory, "gallery" );
        $this->uploadMedia( $accreportingcategory, "file" );

        return $this->transform($accreportingcategory, AccReportingCategoryTransformer::class);
    }

    /**
     * @param DeleteAccReportingCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccReportingCategory(DeleteAccReportingCategoryRequest $request)
    {
        Apiato::call('AccReportingCategory@DeleteAccReportingCategoryAction', [$request]);

        return $this->noContent();
    }
}
