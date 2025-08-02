<?php

namespace App\Containers\AccReceipt\UI\API\Controllers;

use App\Containers\AccReceipt\UI\API\Requests\CreateAccReceiptRequest;
use App\Containers\AccReceipt\UI\API\Requests\DeleteAccReceiptRequest;
use App\Containers\AccReceipt\UI\API\Requests\GetAllAccReceiptsRequest;
use App\Containers\AccReceipt\UI\API\Requests\FindAccReceiptByIdRequest;
use App\Containers\AccReceipt\UI\API\Requests\UpdateAccReceiptRequest;
use App\Containers\AccReceipt\UI\API\Transformers\AccReceiptTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccReceipt\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccReceipt(CreateAccReceiptRequest $request)
    {
        $accreceipt = Apiato::call('AccReceipt@CreateAccReceiptAction', [$request]);

        $this->uploadMedia( $accreceipt, "image", true );
        $this->uploadMedia( $accreceipt, "gallery" );
        $this->uploadMedia( $accreceipt, "file" );

        return $this->created($this->transform($accreceipt, AccReceiptTransformer::class));
    }

    /**
     * @param FindAccReceiptByIdRequest $request
     * @return array
     */
    public function findAccReceiptById(FindAccReceiptByIdRequest $request)
    {
        $accreceipt = Apiato::call('AccReceipt@FindAccReceiptByIdAction', [$request]);

        return $this->transform($accreceipt, AccReceiptTransformer::class);
    }

    /**
     * @param GetAllAccReceiptsRequest $request
     * @return array
     */
    public function getAllAccReceipts(GetAllAccReceiptsRequest $request)
    {
        $accreceipts = Apiato::call('AccReceipt@GetAllAccReceiptsAction', [$request]);

        return $this->transform($accreceipts, AccReceiptTransformer::class);
    }

    /**
     * @param UpdateAccReceiptRequest $request
     * @return array
     */
    public function updateAccReceipt(UpdateAccReceiptRequest $request)
    {
        $accreceipt = Apiato::call('AccReceipt@UpdateAccReceiptAction', [$request]);

        $this->uploadMedia( $accreceipt, "image", true );
        $this->uploadMedia( $accreceipt, "gallery" );
        $this->uploadMedia( $accreceipt, "file" );

        return $this->transform($accreceipt, AccReceiptTransformer::class);
    }

    /**
     * @param DeleteAccReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccReceipt(DeleteAccReceiptRequest $request)
    {
        Apiato::call('AccReceipt@DeleteAccReceiptAction', [$request]);

        return $this->noContent();
    }
}
