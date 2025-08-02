<?php

namespace App\Containers\AccAccountCategory\UI\API\Controllers;

use App\Containers\AccAccountCategory\UI\API\Requests\CreateAccAccountCategoryRequest;
use App\Containers\AccAccountCategory\UI\API\Requests\DeleteAccAccountCategoryRequest;
use App\Containers\AccAccountCategory\UI\API\Requests\GetAllAccAccountCategoriesRequest;
use App\Containers\AccAccountCategory\UI\API\Requests\FindAccAccountCategoryByIdRequest;
use App\Containers\AccAccountCategory\UI\API\Requests\UpdateAccAccountCategoryRequest;
use App\Containers\AccAccountCategory\UI\API\Transformers\AccAccountCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccAccountCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccAccountCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccAccountCategory(CreateAccAccountCategoryRequest $request)
    {
        $accaccountcategory = Apiato::call('AccAccountCategory@CreateAccAccountCategoryAction', [$request]);

        $this->uploadMedia( $accaccountcategory, "image", true );
        $this->uploadMedia( $accaccountcategory, "gallery" );
        $this->uploadMedia( $accaccountcategory, "file" );

        return $this->created($this->transform($accaccountcategory, AccAccountCategoryTransformer::class));
    }

    /**
     * @param FindAccAccountCategoryByIdRequest $request
     * @return array
     */
    public function findAccAccountCategoryById(FindAccAccountCategoryByIdRequest $request)
    {
        $accaccountcategory = Apiato::call('AccAccountCategory@FindAccAccountCategoryByIdAction', [$request]);

        return $this->transform($accaccountcategory, AccAccountCategoryTransformer::class);
    }

    /**
     * @param GetAllAccAccountCategoriesRequest $request
     * @return array
     */
    public function getAllAccAccountCategories(GetAllAccAccountCategoriesRequest $request)
    {
        $accaccountcategories = Apiato::call('AccAccountCategory@GetAllAccAccountCategoriesAction', [$request]);

        return $this->transform($accaccountcategories, AccAccountCategoryTransformer::class);
    }

    /**
     * @param UpdateAccAccountCategoryRequest $request
     * @return array
     */
    public function updateAccAccountCategory(UpdateAccAccountCategoryRequest $request)
    {
        $accaccountcategory = Apiato::call('AccAccountCategory@UpdateAccAccountCategoryAction', [$request]);

        $this->uploadMedia( $accaccountcategory, "image", true );
        $this->uploadMedia( $accaccountcategory, "gallery" );
        $this->uploadMedia( $accaccountcategory, "file" );

        return $this->transform($accaccountcategory, AccAccountCategoryTransformer::class);
    }

    /**
     * @param DeleteAccAccountCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccAccountCategory(DeleteAccAccountCategoryRequest $request)
    {
        Apiato::call('AccAccountCategory@DeleteAccAccountCategoryAction', [$request]);

        return $this->noContent();
    }
}
