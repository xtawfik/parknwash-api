<?php

namespace App\Containers\OptionCategory\UI\API\Controllers;

use App\Containers\OptionCategory\UI\API\Requests\CreateOptionCategoryRequest;
use App\Containers\OptionCategory\UI\API\Requests\DeleteOptionCategoryRequest;
use App\Containers\OptionCategory\UI\API\Requests\GetAllOptionCategoriesRequest;
use App\Containers\OptionCategory\UI\API\Requests\FindOptionCategoryByIdRequest;
use App\Containers\OptionCategory\UI\API\Requests\UpdateOptionCategoryRequest;
use App\Containers\OptionCategory\UI\API\Transformers\OptionCategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OptionCategory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOptionCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOptionCategory(CreateOptionCategoryRequest $request)
    {
        $optioncategory = Apiato::call('OptionCategory@CreateOptionCategoryAction', [$request]);

        $this->uploadMedia( $optioncategory, "image", true );
        $this->uploadMedia( $optioncategory, "gallery" );
        $this->uploadMedia( $optioncategory, "file" );

        return $this->created($this->transform($optioncategory, OptionCategoryTransformer::class));
    }

    /**
     * @param FindOptionCategoryByIdRequest $request
     * @return array
     */
    public function findOptionCategoryById(FindOptionCategoryByIdRequest $request)
    {
        $optioncategory = Apiato::call('OptionCategory@FindOptionCategoryByIdAction', [$request]);

        return $this->transform($optioncategory, OptionCategoryTransformer::class);
    }

    /**
     * @param GetAllOptionCategoriesRequest $request
     * @return array
     */
    public function getAllOptionCategories(GetAllOptionCategoriesRequest $request)
    {
        $optioncategories = Apiato::call('OptionCategory@GetAllOptionCategoriesAction', [$request]);

        return $this->transform($optioncategories, OptionCategoryTransformer::class);
    }

    /**
     * @param UpdateOptionCategoryRequest $request
     * @return array
     */
    public function updateOptionCategory(UpdateOptionCategoryRequest $request)
    {
        $optioncategory = Apiato::call('OptionCategory@UpdateOptionCategoryAction', [$request]);

        $this->uploadMedia( $optioncategory, "image", true );
        $this->uploadMedia( $optioncategory, "gallery" );
        $this->uploadMedia( $optioncategory, "file" );

        return $this->transform($optioncategory, OptionCategoryTransformer::class);
    }

    /**
     * @param DeleteOptionCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOptionCategory(DeleteOptionCategoryRequest $request)
    {
        Apiato::call('OptionCategory@DeleteOptionCategoryAction', [$request]);

        return $this->noContent();
    }
}
