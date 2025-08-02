<?php

namespace App\Containers\AccPayslipItem\UI\API\Controllers;

use App\Containers\AccPayslipItem\UI\API\Requests\CreateAccPayslipItemRequest;
use App\Containers\AccPayslipItem\UI\API\Requests\DeleteAccPayslipItemRequest;
use App\Containers\AccPayslipItem\UI\API\Requests\GetAllAccPayslipItemsRequest;
use App\Containers\AccPayslipItem\UI\API\Requests\FindAccPayslipItemByIdRequest;
use App\Containers\AccPayslipItem\UI\API\Requests\UpdateAccPayslipItemRequest;
use App\Containers\AccPayslipItem\UI\API\Transformers\AccPayslipItemTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslipItem\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslipItem(CreateAccPayslipItemRequest $request)
    {
        $accpayslipitem = Apiato::call('AccPayslipItem@CreateAccPayslipItemAction', [$request]);

        $this->uploadMedia( $accpayslipitem, "image", true );
        $this->uploadMedia( $accpayslipitem, "gallery" );
        $this->uploadMedia( $accpayslipitem, "file" );

        return $this->created($this->transform($accpayslipitem, AccPayslipItemTransformer::class));
    }

    /**
     * @param FindAccPayslipItemByIdRequest $request
     * @return array
     */
    public function findAccPayslipItemById(FindAccPayslipItemByIdRequest $request)
    {
        $accpayslipitem = Apiato::call('AccPayslipItem@FindAccPayslipItemByIdAction', [$request]);

        return $this->transform($accpayslipitem, AccPayslipItemTransformer::class);
    }

    /**
     * @param GetAllAccPayslipItemsRequest $request
     * @return array
     */
    public function getAllAccPayslipItems(GetAllAccPayslipItemsRequest $request)
    {
        $accpayslipitems = Apiato::call('AccPayslipItem@GetAllAccPayslipItemsAction', [$request]);

        return $this->transform($accpayslipitems, AccPayslipItemTransformer::class);
    }

    /**
     * @param UpdateAccPayslipItemRequest $request
     * @return array
     */
    public function updateAccPayslipItem(UpdateAccPayslipItemRequest $request)
    {
        $accpayslipitem = Apiato::call('AccPayslipItem@UpdateAccPayslipItemAction', [$request]);

        $this->uploadMedia( $accpayslipitem, "image", true );
        $this->uploadMedia( $accpayslipitem, "gallery" );
        $this->uploadMedia( $accpayslipitem, "file" );

        return $this->transform($accpayslipitem, AccPayslipItemTransformer::class);
    }

    /**
     * @param DeleteAccPayslipItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslipItem(DeleteAccPayslipItemRequest $request)
    {
        Apiato::call('AccPayslipItem@DeleteAccPayslipItemAction', [$request]);

        return $this->noContent();
    }
}
