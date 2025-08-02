<?php

namespace App\Containers\BillProduct\UI\API\Controllers;

use App\Containers\BillProduct\UI\API\Requests\CreateBillProductRequest;
use App\Containers\BillProduct\UI\API\Requests\DeleteBillProductRequest;
use App\Containers\BillProduct\UI\API\Requests\GetAllBillProductsRequest;
use App\Containers\BillProduct\UI\API\Requests\FindBillProductByIdRequest;
use App\Containers\BillProduct\UI\API\Requests\UpdateBillProductRequest;
use App\Containers\BillProduct\UI\API\Transformers\BillProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\BillProduct\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBillProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBillProduct(CreateBillProductRequest $request)
    {
        $billproduct = Apiato::call('BillProduct@CreateBillProductAction', [$request]);

        $this->uploadMedia( $billproduct, "image", true );
        $this->uploadMedia( $billproduct, "gallery" );
        $this->uploadMedia( $billproduct, "file" );

        return $this->created($this->transform($billproduct, BillProductTransformer::class));
    }

    /**
     * @param FindBillProductByIdRequest $request
     * @return array
     */
    public function findBillProductById(FindBillProductByIdRequest $request)
    {
        $billproduct = Apiato::call('BillProduct@FindBillProductByIdAction', [$request]);

        return $this->transform($billproduct, BillProductTransformer::class);
    }

    /**
     * @param GetAllBillProductsRequest $request
     * @return array
     */
    public function getAllBillProducts(GetAllBillProductsRequest $request)
    {
        $billproducts = Apiato::call('BillProduct@GetAllBillProductsAction', [$request]);

        return $this->transform($billproducts, BillProductTransformer::class);
    }

    /**
     * @param UpdateBillProductRequest $request
     * @return array
     */
    public function updateBillProduct(UpdateBillProductRequest $request)
    {
        $billproduct = Apiato::call('BillProduct@UpdateBillProductAction', [$request]);

        $this->uploadMedia( $billproduct, "image", true );
        $this->uploadMedia( $billproduct, "gallery" );
        $this->uploadMedia( $billproduct, "file" );

        return $this->transform($billproduct, BillProductTransformer::class);
    }

    /**
     * @param DeleteBillProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBillProduct(DeleteBillProductRequest $request)
    {
        Apiato::call('BillProduct@DeleteBillProductAction', [$request]);

        return $this->noContent();
    }
}
