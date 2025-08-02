<?php

namespace App\Containers\Receipt\UI\API\Controllers;

use App\Containers\Receipt\UI\API\Requests\CreateReceiptRequest;
use App\Containers\Receipt\UI\API\Requests\DeleteReceiptRequest;
use App\Containers\Receipt\UI\API\Requests\GetAllReceiptsRequest;
use App\Containers\Receipt\UI\API\Requests\FindReceiptByIdRequest;
use App\Containers\Receipt\UI\API\Requests\UpdateReceiptRequest;
use App\Containers\Receipt\UI\API\Transformers\ReceiptTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Receipt\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createReceipt(CreateReceiptRequest $request)
    {
        $receipt = Apiato::call('Receipt@CreateReceiptAction', [$request]);

        $this->uploadMedia( $receipt, "image", true );
        $this->uploadMedia( $receipt, "gallery" );
        $this->uploadMedia( $receipt, "file" );

        return $this->created($this->transform($receipt, ReceiptTransformer::class));
    }

    /**
     * @param FindReceiptByIdRequest $request
     * @return array
     */
    public function findReceiptById(FindReceiptByIdRequest $request)
    {
        $receipt = Apiato::call('Receipt@FindReceiptByIdAction', [$request]);

        return $this->transform($receipt, ReceiptTransformer::class);
    }

    /**
     * @param GetAllReceiptsRequest $request
     * @return array
     */
    public function getAllReceipts(GetAllReceiptsRequest $request)
    {
        $receipts = Apiato::call('Receipt@GetAllReceiptsAction', [$request]);

        return $this->transform($receipts, ReceiptTransformer::class);
    }

    /**
     * @param UpdateReceiptRequest $request
     * @return array
     */
    public function updateReceipt(UpdateReceiptRequest $request)
    {
        $receipt = Apiato::call('Receipt@UpdateReceiptAction', [$request]);

        $this->uploadMedia( $receipt, "image", true );
        $this->uploadMedia( $receipt, "gallery" );
        $this->uploadMedia( $receipt, "file" );

        return $this->transform($receipt, ReceiptTransformer::class);
    }

    /**
     * @param DeleteReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReceipt(DeleteReceiptRequest $request)
    {
        Apiato::call('Receipt@DeleteReceiptAction', [$request]);

        return $this->noContent();
    }
}
