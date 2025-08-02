<?php

namespace App\Containers\AccPurchaseInvoice\UI\API\Controllers;

use App\Containers\AccPurchaseInvoice\UI\API\Requests\CreateAccPurchaseInvoiceRequest;
use App\Containers\AccPurchaseInvoice\UI\API\Requests\DeleteAccPurchaseInvoiceRequest;
use App\Containers\AccPurchaseInvoice\UI\API\Requests\GetAllAccPurchaseInvoicesRequest;
use App\Containers\AccPurchaseInvoice\UI\API\Requests\FindAccPurchaseInvoiceByIdRequest;
use App\Containers\AccPurchaseInvoice\UI\API\Requests\UpdateAccPurchaseInvoiceRequest;
use App\Containers\AccPurchaseInvoice\UI\API\Transformers\AccPurchaseInvoiceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPurchaseInvoice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPurchaseInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPurchaseInvoice(CreateAccPurchaseInvoiceRequest $request)
    {
        $accpurchaseinvoice = Apiato::call('AccPurchaseInvoice@CreateAccPurchaseInvoiceAction', [$request]);

        $this->uploadMedia( $accpurchaseinvoice, "image", true );
        $this->uploadMedia( $accpurchaseinvoice, "gallery" );
        $this->uploadMedia( $accpurchaseinvoice, "file" );

        return $this->created($this->transform($accpurchaseinvoice, AccPurchaseInvoiceTransformer::class));
    }

    /**
     * @param FindAccPurchaseInvoiceByIdRequest $request
     * @return array
     */
    public function findAccPurchaseInvoiceById(FindAccPurchaseInvoiceByIdRequest $request)
    {
        $accpurchaseinvoice = Apiato::call('AccPurchaseInvoice@FindAccPurchaseInvoiceByIdAction', [$request]);

        return $this->transform($accpurchaseinvoice, AccPurchaseInvoiceTransformer::class);
    }

    /**
     * @param GetAllAccPurchaseInvoicesRequest $request
     * @return array
     */
    public function getAllAccPurchaseInvoices(GetAllAccPurchaseInvoicesRequest $request)
    {
        $accpurchaseinvoices = Apiato::call('AccPurchaseInvoice@GetAllAccPurchaseInvoicesAction', [$request]);

        return $this->transform($accpurchaseinvoices, AccPurchaseInvoiceTransformer::class);
    }

    /**
     * @param UpdateAccPurchaseInvoiceRequest $request
     * @return array
     */
    public function updateAccPurchaseInvoice(UpdateAccPurchaseInvoiceRequest $request)
    {
        $accpurchaseinvoice = Apiato::call('AccPurchaseInvoice@UpdateAccPurchaseInvoiceAction', [$request]);

        $this->uploadMedia( $accpurchaseinvoice, "image", true );
        $this->uploadMedia( $accpurchaseinvoice, "gallery" );
        $this->uploadMedia( $accpurchaseinvoice, "file" );

        return $this->transform($accpurchaseinvoice, AccPurchaseInvoiceTransformer::class);
    }

    /**
     * @param DeleteAccPurchaseInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPurchaseInvoice(DeleteAccPurchaseInvoiceRequest $request)
    {
        Apiato::call('AccPurchaseInvoice@DeleteAccPurchaseInvoiceAction', [$request]);

        return $this->noContent();
    }
}
