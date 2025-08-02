<?php

namespace App\Containers\AccSupplier\UI\API\Controllers;

use App\Containers\AccSupplier\UI\API\Requests\CreateAccSupplierRequest;
use App\Containers\AccSupplier\UI\API\Requests\DeleteAccSupplierRequest;
use App\Containers\AccSupplier\UI\API\Requests\GetAllAccSuppliersRequest;
use App\Containers\AccSupplier\UI\API\Requests\FindAccSupplierByIdRequest;
use App\Containers\AccSupplier\UI\API\Requests\UpdateAccSupplierRequest;
use App\Containers\AccSupplier\UI\API\Transformers\AccSupplierTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccSupplier\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccSupplierRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccSupplier(CreateAccSupplierRequest $request)
    {
        $accsupplier = Apiato::call('AccSupplier@CreateAccSupplierAction', [$request]);

        $this->uploadMedia( $accsupplier, "image", true );
        $this->uploadMedia( $accsupplier, "gallery" );
        $this->uploadMedia( $accsupplier, "file" );

        return $this->created($this->transform($accsupplier, AccSupplierTransformer::class));
    }

    /**
     * @param FindAccSupplierByIdRequest $request
     * @return array
     */
    public function findAccSupplierById(FindAccSupplierByIdRequest $request)
    {
        $accsupplier = Apiato::call('AccSupplier@FindAccSupplierByIdAction', [$request]);

        return $this->transform($accsupplier, AccSupplierTransformer::class);
    }

    /**
     * @param GetAllAccSuppliersRequest $request
     * @return array
     */
    public function getAllAccSuppliers(GetAllAccSuppliersRequest $request)
    {
        $accsuppliers = Apiato::call('AccSupplier@GetAllAccSuppliersAction', [$request]);

        return $this->transform($accsuppliers, AccSupplierTransformer::class);
    }

    /**
     * @param UpdateAccSupplierRequest $request
     * @return array
     */
    public function updateAccSupplier(UpdateAccSupplierRequest $request)
    {
        $accsupplier = Apiato::call('AccSupplier@UpdateAccSupplierAction', [$request]);

        $this->uploadMedia( $accsupplier, "image", true );
        $this->uploadMedia( $accsupplier, "gallery" );
        $this->uploadMedia( $accsupplier, "file" );

        return $this->transform($accsupplier, AccSupplierTransformer::class);
    }

    /**
     * @param DeleteAccSupplierRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccSupplier(DeleteAccSupplierRequest $request)
    {
        Apiato::call('AccSupplier@DeleteAccSupplierAction', [$request]);

        return $this->noContent();
    }
}
