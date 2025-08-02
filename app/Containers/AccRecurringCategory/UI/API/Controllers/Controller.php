<?php

namespace App\Containers\AccRecurringCategory\UI\API\Controllers;

use App\Containers\AccRecurringCategory\UI\API\Requests\CreateAccRecurringCategoryRequest;
use App\Containers\AccRecurringCategory\UI\API\Requests\DeleteAccRecurringCategoryRequest;
use App\Containers\AccRecurringCategory\UI\API\Requests\GetAllAccRecurringCategoriesRequest;
use App\Containers\AccRecurringCategory\UI\API\Requests\FindAccRecurringCategoryByIdRequest;
use App\Containers\AccRecurringCategory\UI\API\Requests\UpdateAccRecurringCategoryRequest;
use App\Containers\AccRecurringCategory\UI\API\Transformers\AccRecurringCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccRecurringCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccRecurringCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccRecurringCategory(CreateAccRecurringCategoryRequest $request)
    {
        $accrecurringcategory = Apiato::call('AccRecurringCategory@CreateAccRecurringCategoryAction', [$request]);

        $this->uploadMedia( $accrecurringcategory, "image", true );
        $this->uploadMedia( $accrecurringcategory, "gallery" );
        $this->uploadMedia( $accrecurringcategory, "file" );

        return $this->created($this->transform($accrecurringcategory, AccRecurringCategoryTransformer::class));
    }

    /**
     * @param FindAccRecurringCategoryByIdRequest $request
     * @return array
     */
    public function findAccRecurringCategoryById(FindAccRecurringCategoryByIdRequest $request)
    {
        $accrecurringcategory = Apiato::call('AccRecurringCategory@FindAccRecurringCategoryByIdAction', [$request]);

        return $this->transform($accrecurringcategory, AccRecurringCategoryTransformer::class);
    }

    /**
     * @param GetAllAccRecurringCategoriesRequest $request
     * @return array
     */
    public function getAllAccRecurringCategories(GetAllAccRecurringCategoriesRequest $request)
    {
        $accrecurringcategories = Apiato::call('AccRecurringCategory@GetAllAccRecurringCategoriesAction', [$request]);

        return $this->transform($accrecurringcategories, AccRecurringCategoryTransformer::class);
    }

    /**
     * @param UpdateAccRecurringCategoryRequest $request
     * @return array
     */
    public function updateAccRecurringCategory(UpdateAccRecurringCategoryRequest $request)
    {
        $accrecurringcategory = Apiato::call('AccRecurringCategory@UpdateAccRecurringCategoryAction', [$request]);

        $this->uploadMedia( $accrecurringcategory, "image", true );
        $this->uploadMedia( $accrecurringcategory, "gallery" );
        $this->uploadMedia( $accrecurringcategory, "file" );

        return $this->transform($accrecurringcategory, AccRecurringCategoryTransformer::class);
    }

    /**
     * @param DeleteAccRecurringCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccRecurringCategory(DeleteAccRecurringCategoryRequest $request)
    {
        Apiato::call('AccRecurringCategory@DeleteAccRecurringCategoryAction', [$request]);

        return $this->noContent();
    }
}
