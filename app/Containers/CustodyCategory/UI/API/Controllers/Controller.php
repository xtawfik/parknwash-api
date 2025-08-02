<?php

namespace App\Containers\CustodyCategory\UI\API\Controllers;

use App\Containers\CustodyCategory\UI\API\Requests\CreateCustodyCategoryRequest;
use App\Containers\CustodyCategory\UI\API\Requests\DeleteCustodyCategoryRequest;
use App\Containers\CustodyCategory\UI\API\Requests\GetAllCustodyCategoriesRequest;
use App\Containers\CustodyCategory\UI\API\Requests\FindCustodyCategoryByIdRequest;
use App\Containers\CustodyCategory\UI\API\Requests\UpdateCustodyCategoryRequest;
use App\Containers\CustodyCategory\UI\API\Transformers\CustodyCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CustodyCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCustodyCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustodyCategory(CreateCustodyCategoryRequest $request)
    {
        $custodycategory = Apiato::call('CustodyCategory@CreateCustodyCategoryAction', [$request]);

        $this->uploadMedia( $custodycategory, "image", true );
        $this->uploadMedia( $custodycategory, "gallery" );
        $this->uploadMedia( $custodycategory, "file" );

        return $this->created($this->transform($custodycategory, CustodyCategoryTransformer::class));
    }

    /**
     * @param FindCustodyCategoryByIdRequest $request
     * @return array
     */
    public function findCustodyCategoryById(FindCustodyCategoryByIdRequest $request)
    {
        $custodycategory = Apiato::call('CustodyCategory@FindCustodyCategoryByIdAction', [$request]);

        return $this->transform($custodycategory, CustodyCategoryTransformer::class);
    }

    /**
     * @param GetAllCustodyCategoriesRequest $request
     * @return array
     */
    public function getAllCustodyCategories(GetAllCustodyCategoriesRequest $request)
    {
        $custodycategories = Apiato::call('CustodyCategory@GetAllCustodyCategoriesAction', [$request]);

        return $this->transform($custodycategories, CustodyCategoryTransformer::class);
    }

    /**
     * @param UpdateCustodyCategoryRequest $request
     * @return array
     */
    public function updateCustodyCategory(UpdateCustodyCategoryRequest $request)
    {
        $custodycategory = Apiato::call('CustodyCategory@UpdateCustodyCategoryAction', [$request]);

        $this->uploadMedia( $custodycategory, "image", true );
        $this->uploadMedia( $custodycategory, "gallery" );
        $this->uploadMedia( $custodycategory, "file" );

        return $this->transform($custodycategory, CustodyCategoryTransformer::class);
    }

    /**
     * @param DeleteCustodyCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCustodyCategory(DeleteCustodyCategoryRequest $request)
    {
        Apiato::call('CustodyCategory@DeleteCustodyCategoryAction', [$request]);

        return $this->noContent();
    }
}
