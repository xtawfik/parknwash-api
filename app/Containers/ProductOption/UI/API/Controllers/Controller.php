<?php

namespace App\Containers\ProductOption\UI\API\Controllers;

use App\Containers\ProductOption\UI\API\Requests\CreateProductOptionRequest;
use App\Containers\ProductOption\UI\API\Requests\DeleteProductOptionRequest;
use App\Containers\ProductOption\UI\API\Requests\GetAllProductOptionsRequest;
use App\Containers\ProductOption\UI\API\Requests\FindProductOptionByIdRequest;
use App\Containers\ProductOption\UI\API\Requests\UpdateProductOptionRequest;
use App\Containers\ProductOption\UI\API\Transformers\ProductOptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ProductOption\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateProductOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProductOption(CreateProductOptionRequest $request)
    {
        $productoption = Apiato::call('ProductOption@CreateProductOptionAction', [$request]);

        $this->uploadMedia( $productoption, "image", true );
        $this->uploadMedia( $productoption, "gallery" );
        $this->uploadMedia( $productoption, "file" );

        return $this->created($this->transform($productoption, ProductOptionTransformer::class));
    }

    /**
     * @param FindProductOptionByIdRequest $request
     * @return array
     */
    public function findProductOptionById(FindProductOptionByIdRequest $request)
    {
        $productoption = Apiato::call('ProductOption@FindProductOptionByIdAction', [$request]);

        return $this->transform($productoption, ProductOptionTransformer::class);
    }

    /**
     * @param GetAllProductOptionsRequest $request
     * @return array
     */
    public function getAllProductOptions(GetAllProductOptionsRequest $request)
    {
        $productoptions = Apiato::call('ProductOption@GetAllProductOptionsAction', [$request]);

        return $this->transform($productoptions, ProductOptionTransformer::class);
    }

    /**
     * @param UpdateProductOptionRequest $request
     * @return array
     */
    public function updateProductOption(UpdateProductOptionRequest $request)
    {
        $productoption = Apiato::call('ProductOption@UpdateProductOptionAction', [$request]);

        $this->uploadMedia( $productoption, "image", true );
        $this->uploadMedia( $productoption, "gallery" );
        $this->uploadMedia( $productoption, "file" );

        return $this->transform($productoption, ProductOptionTransformer::class);
    }

    /**
     * @param DeleteProductOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProductOption(DeleteProductOptionRequest $request)
    {
        Apiato::call('ProductOption@DeleteProductOptionAction', [$request]);

        return $this->noContent();
    }
}
