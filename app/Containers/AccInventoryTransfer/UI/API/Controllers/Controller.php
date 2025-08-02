<?php

namespace App\Containers\AccInventoryTransfer\UI\API\Controllers;

use App\Containers\AccInventoryTransfer\UI\API\Requests\CreateAccInventoryTransferRequest;
use App\Containers\AccInventoryTransfer\UI\API\Requests\DeleteAccInventoryTransferRequest;
use App\Containers\AccInventoryTransfer\UI\API\Requests\GetAllAccInventoryTransfersRequest;
use App\Containers\AccInventoryTransfer\UI\API\Requests\FindAccInventoryTransferByIdRequest;
use App\Containers\AccInventoryTransfer\UI\API\Requests\UpdateAccInventoryTransferRequest;
use App\Containers\AccInventoryTransfer\UI\API\Transformers\AccInventoryTransferTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventoryTransfer\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryTransferRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventoryTransfer(CreateAccInventoryTransferRequest $request)
    {
        $accinventorytransfer = Apiato::call('AccInventoryTransfer@CreateAccInventoryTransferAction', [$request]);

        $this->uploadMedia( $accinventorytransfer, "image", true );
        $this->uploadMedia( $accinventorytransfer, "gallery" );
        $this->uploadMedia( $accinventorytransfer, "file" );

        return $this->created($this->transform($accinventorytransfer, AccInventoryTransferTransformer::class));
    }

    /**
     * @param FindAccInventoryTransferByIdRequest $request
     * @return array
     */
    public function findAccInventoryTransferById(FindAccInventoryTransferByIdRequest $request)
    {
        $accinventorytransfer = Apiato::call('AccInventoryTransfer@FindAccInventoryTransferByIdAction', [$request]);

        return $this->transform($accinventorytransfer, AccInventoryTransferTransformer::class);
    }

    /**
     * @param GetAllAccInventoryTransfersRequest $request
     * @return array
     */
    public function getAllAccInventoryTransfers(GetAllAccInventoryTransfersRequest $request)
    {
        $accinventorytransfers = Apiato::call('AccInventoryTransfer@GetAllAccInventoryTransfersAction', [$request]);

        return $this->transform($accinventorytransfers, AccInventoryTransferTransformer::class);
    }

    /**
     * @param UpdateAccInventoryTransferRequest $request
     * @return array
     */
    public function updateAccInventoryTransfer(UpdateAccInventoryTransferRequest $request)
    {
        $accinventorytransfer = Apiato::call('AccInventoryTransfer@UpdateAccInventoryTransferAction', [$request]);

        $this->uploadMedia( $accinventorytransfer, "image", true );
        $this->uploadMedia( $accinventorytransfer, "gallery" );
        $this->uploadMedia( $accinventorytransfer, "file" );

        return $this->transform($accinventorytransfer, AccInventoryTransferTransformer::class);
    }

    /**
     * @param DeleteAccInventoryTransferRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventoryTransfer(DeleteAccInventoryTransferRequest $request)
    {
        Apiato::call('AccInventoryTransfer@DeleteAccInventoryTransferAction', [$request]);

        return $this->noContent();
    }
}
