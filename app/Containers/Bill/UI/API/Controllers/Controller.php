<?php

namespace App\Containers\Bill\UI\API\Controllers;

use App\Containers\Bill\UI\API\Requests\CreateBillRequest;
use App\Containers\Bill\UI\API\Requests\DeleteBillRequest;
use App\Containers\Bill\UI\API\Requests\GetAllBillsRequest;
use App\Containers\Bill\UI\API\Requests\FindBillByIdRequest;
use App\Containers\Bill\UI\API\Requests\UpdateBillRequest;
use App\Containers\Bill\UI\API\Transformers\BillTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Bill\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBillRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBill(CreateBillRequest $request)
    {
        $bill = Apiato::call('Bill@CreateBillAction', [$request]);

        $this->uploadMedia( $bill, "image", true );
        $this->uploadMedia( $bill, "gallery" );
        $this->uploadMedia( $bill, "file" );

        return $this->created($this->transform($bill, BillTransformer::class));
    }

    /**
     * @param FindBillByIdRequest $request
     * @return array
     */
    public function findBillById(FindBillByIdRequest $request)
    {
        $bill = Apiato::call('Bill@FindBillByIdAction', [$request]);

        return $this->transform($bill, BillTransformer::class);
    }

    /**
     * @param GetAllBillsRequest $request
     * @return array
     */
    public function getAllBills(GetAllBillsRequest $request)
    {
        $bills = Apiato::call('Bill@GetAllBillsAction', [$request]);

        return $this->transform($bills, BillTransformer::class);
    }

    /**
     * @param UpdateBillRequest $request
     * @return array
     */
    public function updateBill(UpdateBillRequest $request)
    {
        $bill = Apiato::call('Bill@UpdateBillAction', [$request]);

        $this->uploadMedia( $bill, "image", true );
        $this->uploadMedia( $bill, "gallery" );
        $this->uploadMedia( $bill, "file" );

        return $this->transform($bill, BillTransformer::class);
    }

    /**
     * @param DeleteBillRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBill(DeleteBillRequest $request)
    {
        Apiato::call('Bill@DeleteBillAction', [$request]);

        return $this->noContent();
    }
}
