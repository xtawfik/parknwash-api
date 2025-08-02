<?php

namespace App\Containers\AccFooterCategory\UI\API\Controllers;

use App\Containers\AccFooterCategory\UI\API\Requests\CreateAccFooterCategoryRequest;
use App\Containers\AccFooterCategory\UI\API\Requests\DeleteAccFooterCategoryRequest;
use App\Containers\AccFooterCategory\UI\API\Requests\GetAllAccFooterCategoriesRequest;
use App\Containers\AccFooterCategory\UI\API\Requests\FindAccFooterCategoryByIdRequest;
use App\Containers\AccFooterCategory\UI\API\Requests\UpdateAccFooterCategoryRequest;
use App\Containers\AccFooterCategory\UI\API\Transformers\AccFooterCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccFooterCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccFooterCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccFooterCategory(CreateAccFooterCategoryRequest $request)
    {
        $accfootercategory = Apiato::call('AccFooterCategory@CreateAccFooterCategoryAction', [$request]);

        $this->uploadMedia( $accfootercategory, "image", true );
        $this->uploadMedia( $accfootercategory, "gallery" );
        $this->uploadMedia( $accfootercategory, "file" );

        return $this->created($this->transform($accfootercategory, AccFooterCategoryTransformer::class));
    }

    /**
     * @param FindAccFooterCategoryByIdRequest $request
     * @return array
     */
    public function findAccFooterCategoryById(FindAccFooterCategoryByIdRequest $request)
    {
        $accfootercategory = Apiato::call('AccFooterCategory@FindAccFooterCategoryByIdAction', [$request]);

        return $this->transform($accfootercategory, AccFooterCategoryTransformer::class);
    }

    /**
     * @param GetAllAccFooterCategoriesRequest $request
     * @return array
     */
    public function getAllAccFooterCategories(GetAllAccFooterCategoriesRequest $request)
    {
        $accfootercategories = Apiato::call('AccFooterCategory@GetAllAccFooterCategoriesAction', [$request]);

        return $this->transform($accfootercategories, AccFooterCategoryTransformer::class);
    }

    /**
     * @param UpdateAccFooterCategoryRequest $request
     * @return array
     */
    public function updateAccFooterCategory(UpdateAccFooterCategoryRequest $request)
    {
        $accfootercategory = Apiato::call('AccFooterCategory@UpdateAccFooterCategoryAction', [$request]);

        $this->uploadMedia( $accfootercategory, "image", true );
        $this->uploadMedia( $accfootercategory, "gallery" );
        $this->uploadMedia( $accfootercategory, "file" );

        return $this->transform($accfootercategory, AccFooterCategoryTransformer::class);
    }

    /**
     * @param DeleteAccFooterCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccFooterCategory(DeleteAccFooterCategoryRequest $request)
    {
        Apiato::call('AccFooterCategory@DeleteAccFooterCategoryAction', [$request]);

        return $this->noContent();
    }
}
