<?php

namespace App\Containers\AccGoodsReceipt\UI\API\Controllers;

use App\Containers\AccGoodsReceipt\UI\API\Requests\CreateAccGoodsReceiptRequest;
use App\Containers\AccGoodsReceipt\UI\API\Requests\DeleteAccGoodsReceiptRequest;
use App\Containers\AccGoodsReceipt\UI\API\Requests\GetAllAccGoodsReceiptsRequest;
use App\Containers\AccGoodsReceipt\UI\API\Requests\FindAccGoodsReceiptByIdRequest;
use App\Containers\AccGoodsReceipt\UI\API\Requests\UpdateAccGoodsReceiptRequest;
use App\Containers\AccGoodsReceipt\UI\API\Transformers\AccGoodsReceiptTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccGoodsReceipt\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccGoodsReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccGoodsReceipt(CreateAccGoodsReceiptRequest $request)
    {
        $accgoodsreceipt = Apiato::call('AccGoodsReceipt@CreateAccGoodsReceiptAction', [$request]);

        $this->uploadMedia( $accgoodsreceipt, "image", true );
        $this->uploadMedia( $accgoodsreceipt, "gallery" );
        $this->uploadMedia( $accgoodsreceipt, "file" );

        return $this->created($this->transform($accgoodsreceipt, AccGoodsReceiptTransformer::class));
    }

    /**
     * @param FindAccGoodsReceiptByIdRequest $request
     * @return array
     */
    public function findAccGoodsReceiptById(FindAccGoodsReceiptByIdRequest $request)
    {
        $accgoodsreceipt = Apiato::call('AccGoodsReceipt@FindAccGoodsReceiptByIdAction', [$request]);

        return $this->transform($accgoodsreceipt, AccGoodsReceiptTransformer::class);
    }

    /**
     * @param GetAllAccGoodsReceiptsRequest $request
     * @return array
     */
    public function getAllAccGoodsReceipts(GetAllAccGoodsReceiptsRequest $request)
    {
        $accgoodsreceipts = Apiato::call('AccGoodsReceipt@GetAllAccGoodsReceiptsAction', [$request]);

        return $this->transform($accgoodsreceipts, AccGoodsReceiptTransformer::class);
    }

    /**
     * @param UpdateAccGoodsReceiptRequest $request
     * @return array
     */
    public function updateAccGoodsReceipt(UpdateAccGoodsReceiptRequest $request)
    {
        $accgoodsreceipt = Apiato::call('AccGoodsReceipt@UpdateAccGoodsReceiptAction', [$request]);

        $this->uploadMedia( $accgoodsreceipt, "image", true );
        $this->uploadMedia( $accgoodsreceipt, "gallery" );
        $this->uploadMedia( $accgoodsreceipt, "file" );

        return $this->transform($accgoodsreceipt, AccGoodsReceiptTransformer::class);
    }

    /**
     * @param DeleteAccGoodsReceiptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccGoodsReceipt(DeleteAccGoodsReceiptRequest $request)
    {
        Apiato::call('AccGoodsReceipt@DeleteAccGoodsReceiptAction', [$request]);

        return $this->noContent();
    }
}
