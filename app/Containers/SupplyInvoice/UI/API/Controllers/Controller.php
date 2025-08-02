<?php

namespace App\Containers\SupplyInvoice\UI\API\Controllers;

use App\Containers\SupplyInvoice\UI\API\Requests\CreateSupplyInvoiceRequest;
use App\Containers\SupplyInvoice\UI\API\Requests\DeleteSupplyInvoiceRequest;
use App\Containers\SupplyInvoice\UI\API\Requests\GetAllSupplyInvoicesRequest;
use App\Containers\SupplyInvoice\UI\API\Requests\FindSupplyInvoiceByIdRequest;
use App\Containers\SupplyInvoice\UI\API\Requests\UpdateSupplyInvoiceRequest;
use App\Containers\SupplyInvoice\UI\API\Transformers\SupplyInvoiceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\SupplyInvoice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSupplyInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSupplyInvoice(CreateSupplyInvoiceRequest $request)
    {
        $supplyinvoice = Apiato::call('SupplyInvoice@CreateSupplyInvoiceAction', [$request]);

        $this->uploadMedia( $supplyinvoice, "image", true );
        $this->uploadMedia( $supplyinvoice, "gallery" );
        $this->uploadMedia( $supplyinvoice, "file" );

        return $this->created($this->transform($supplyinvoice, SupplyInvoiceTransformer::class));
    }

    /**
     * @param FindSupplyInvoiceByIdRequest $request
     * @return array
     */
    public function findSupplyInvoiceById(FindSupplyInvoiceByIdRequest $request)
    {
        $supplyinvoice = Apiato::call('SupplyInvoice@FindSupplyInvoiceByIdAction', [$request]);

        return $this->transform($supplyinvoice, SupplyInvoiceTransformer::class);
    }

    /**
     * @param GetAllSupplyInvoicesRequest $request
     * @return array
     */
    public function getAllSupplyInvoices(GetAllSupplyInvoicesRequest $request)
    {
        $supplyinvoices = Apiato::call('SupplyInvoice@GetAllSupplyInvoicesAction', [$request]);

        return $this->transform($supplyinvoices, SupplyInvoiceTransformer::class);
    }

    /**
     * @param UpdateSupplyInvoiceRequest $request
     * @return array
     */
    public function updateSupplyInvoice(UpdateSupplyInvoiceRequest $request)
    {
        $supplyinvoice = Apiato::call('SupplyInvoice@UpdateSupplyInvoiceAction', [$request]);

        $this->uploadMedia( $supplyinvoice, "image", true );
        $this->uploadMedia( $supplyinvoice, "gallery" );
        $this->uploadMedia( $supplyinvoice, "file" );

        return $this->transform($supplyinvoice, SupplyInvoiceTransformer::class);
    }

    /**
     * @param DeleteSupplyInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSupplyInvoice(DeleteSupplyInvoiceRequest $request)
    {
        Apiato::call('SupplyInvoice@DeleteSupplyInvoiceAction', [$request]);

        return $this->noContent();
    }
}
