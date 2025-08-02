<?php

namespace App\Containers\AccWithholdingTaxReceipt\UI\API\Controllers;

use App\Containers\AccWithholdingTaxReceipt\UI\API\Requests\CreateAccWithholdingTaxReceiptRequest;
use App\Containers\AccWithholdingTaxReceipt\UI\API\Requests\DeleteAccWithholdingTaxReceiptRequest;
use App\Containers\AccWithholdingTaxReceipt\UI\API\Requests\GetAllAccWithholdingTaxReceiptsRequest;
use App\Containers\AccWithholdingTaxReceipt\UI\API\Requests\FindAccWithholdingTaxReceiptByIdRequest;
use App\Containers\AccWithholdingTaxReceipt\UI\API\Requests\UpdateAccWithholdingTaxReceiptRequest;
use App\Containers\AccWithholdingTaxReceipt\UI\API\Transformers\AccWithholdingTaxReceiptTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccWithholdingTaxReceipt\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccWithholdingTaxReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccWithholdingTaxReceipt(CreateAccWithholdingTaxReceiptRequest $request)
    {
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@CreateAccWithholdingTaxReceiptAction', [$request]);

        $this->uploadMedia( $accwithholdingtaxreceipt, "image", true );
        $this->uploadMedia( $accwithholdingtaxreceipt, "gallery" );
        $this->uploadMedia( $accwithholdingtaxreceipt, "file" );

        return $this->created($this->transform($accwithholdingtaxreceipt, AccWithholdingTaxReceiptTransformer::class));
    }

    /**
     * @param FindAccWithholdingTaxReceiptByIdRequest $request
     * @return array
     */
    public function findAccWithholdingTaxReceiptById(FindAccWithholdingTaxReceiptByIdRequest $request)
    {
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@FindAccWithholdingTaxReceiptByIdAction', [$request]);

        return $this->transform($accwithholdingtaxreceipt, AccWithholdingTaxReceiptTransformer::class);
    }

    /**
     * @param GetAllAccWithholdingTaxReceiptsRequest $request
     * @return array
     */
    public function getAllAccWithholdingTaxReceipts(GetAllAccWithholdingTaxReceiptsRequest $request)
    {
        $accwithholdingtaxreceipts = Apiato::call('AccWithholdingTaxReceipt@GetAllAccWithholdingTaxReceiptsAction', [$request]);

        return $this->transform($accwithholdingtaxreceipts, AccWithholdingTaxReceiptTransformer::class);
    }

    /**
     * @param UpdateAccWithholdingTaxReceiptRequest $request
     * @return array
     */
    public function updateAccWithholdingTaxReceipt(UpdateAccWithholdingTaxReceiptRequest $request)
    {
        $accwithholdingtaxreceipt = Apiato::call('AccWithholdingTaxReceipt@UpdateAccWithholdingTaxReceiptAction', [$request]);

        $this->uploadMedia( $accwithholdingtaxreceipt, "image", true );
        $this->uploadMedia( $accwithholdingtaxreceipt, "gallery" );
        $this->uploadMedia( $accwithholdingtaxreceipt, "file" );

        return $this->transform($accwithholdingtaxreceipt, AccWithholdingTaxReceiptTransformer::class);
    }

    /**
     * @param DeleteAccWithholdingTaxReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccWithholdingTaxReceipt(DeleteAccWithholdingTaxReceiptRequest $request)
    {
        Apiato::call('AccWithholdingTaxReceipt@DeleteAccWithholdingTaxReceiptAction', [$request]);

        return $this->noContent();
    }
}
