<?php

namespace App\Containers\AccSalesInvoice\UI\API\Controllers;

use App\Containers\AccSalesInvoice\UI\API\Requests\CreateAccSalesInvoiceRequest;
use App\Containers\AccSalesInvoice\UI\API\Requests\DeleteAccSalesInvoiceRequest;
use App\Containers\AccSalesInvoice\UI\API\Requests\GetAllAccSalesInvoicesRequest;
use App\Containers\AccSalesInvoice\UI\API\Requests\FindAccSalesInvoiceByIdRequest;
use App\Containers\AccSalesInvoice\UI\API\Requests\UpdateAccSalesInvoiceRequest;
use App\Containers\AccSalesInvoice\UI\API\Transformers\AccSalesInvoiceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccSalesInvoice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccSalesInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccSalesInvoice(CreateAccSalesInvoiceRequest $request)
    {
        $accsalesinvoice = Apiato::call('AccSalesInvoice@CreateAccSalesInvoiceAction', [$request]);

        $this->uploadMedia( $accsalesinvoice, "image", true );
        $this->uploadMedia( $accsalesinvoice, "gallery" );
        $this->uploadMedia( $accsalesinvoice, "file" );

        return $this->created($this->transform($accsalesinvoice, AccSalesInvoiceTransformer::class));
    }

    /**
     * @param FindAccSalesInvoiceByIdRequest $request
     * @return array
     */
    public function findAccSalesInvoiceById(FindAccSalesInvoiceByIdRequest $request)
    {
        $accsalesinvoice = Apiato::call('AccSalesInvoice@FindAccSalesInvoiceByIdAction', [$request]);

        return $this->transform($accsalesinvoice, AccSalesInvoiceTransformer::class);
    }

    /**
     * @param GetAllAccSalesInvoicesRequest $request
     * @return array
     */
    public function getAllAccSalesInvoices(GetAllAccSalesInvoicesRequest $request)
    {
        $accsalesinvoices = Apiato::call('AccSalesInvoice@GetAllAccSalesInvoicesAction', [$request]);

        return $this->transform($accsalesinvoices, AccSalesInvoiceTransformer::class);
    }

    /**
     * @param UpdateAccSalesInvoiceRequest $request
     * @return array
     */
    public function updateAccSalesInvoice(UpdateAccSalesInvoiceRequest $request)
    {
        $accsalesinvoice = Apiato::call('AccSalesInvoice@UpdateAccSalesInvoiceAction', [$request]);

        $this->uploadMedia( $accsalesinvoice, "image", true );
        $this->uploadMedia( $accsalesinvoice, "gallery" );
        $this->uploadMedia( $accsalesinvoice, "file" );

        return $this->transform($accsalesinvoice, AccSalesInvoiceTransformer::class);
    }

    /**
     * @param DeleteAccSalesInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccSalesInvoice(DeleteAccSalesInvoiceRequest $request)
    {
        Apiato::call('AccSalesInvoice@DeleteAccSalesInvoiceAction', [$request]);

        return $this->noContent();
    }
}
