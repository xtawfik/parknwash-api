<?php

namespace App\Containers\AccAcountTransfer\UI\API\Controllers;

use App\Containers\AccAcountTransfer\UI\API\Requests\CreateAccAcountTransferRequest;
use App\Containers\AccAcountTransfer\UI\API\Requests\DeleteAccAcountTransferRequest;
use App\Containers\AccAcountTransfer\UI\API\Requests\GetAllAccAcountTransfersRequest;
use App\Containers\AccAcountTransfer\UI\API\Requests\FindAccAcountTransferByIdRequest;
use App\Containers\AccAcountTransfer\UI\API\Requests\UpdateAccAcountTransferRequest;
use App\Containers\AccAcountTransfer\UI\API\Transformers\AccAcountTransferTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccAcountTransfer\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccAcountTransferRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccAcountTransfer(CreateAccAcountTransferRequest $request)
    {
        $accacounttransfer = Apiato::call('AccAcountTransfer@CreateAccAcountTransferAction', [$request]);

        $this->uploadMedia( $accacounttransfer, "image", true );
        $this->uploadMedia( $accacounttransfer, "gallery" );
        $this->uploadMedia( $accacounttransfer, "file" );

        return $this->created($this->transform($accacounttransfer, AccAcountTransferTransformer::class));
    }

    /**
     * @param FindAccAcountTransferByIdRequest $request
     * @return array
     */
    public function findAccAcountTransferById(FindAccAcountTransferByIdRequest $request)
    {
        $accacounttransfer = Apiato::call('AccAcountTransfer@FindAccAcountTransferByIdAction', [$request]);

        return $this->transform($accacounttransfer, AccAcountTransferTransformer::class);
    }

    /**
     * @param GetAllAccAcountTransfersRequest $request
     * @return array
     */
    public function getAllAccAcountTransfers(GetAllAccAcountTransfersRequest $request)
    {
        $accacounttransfers = Apiato::call('AccAcountTransfer@GetAllAccAcountTransfersAction', [$request]);

        return $this->transform($accacounttransfers, AccAcountTransferTransformer::class);
    }

    /**
     * @param UpdateAccAcountTransferRequest $request
     * @return array
     */
    public function updateAccAcountTransfer(UpdateAccAcountTransferRequest $request)
    {
        $accacounttransfer = Apiato::call('AccAcountTransfer@UpdateAccAcountTransferAction', [$request]);

        $this->uploadMedia( $accacounttransfer, "image", true );
        $this->uploadMedia( $accacounttransfer, "gallery" );
        $this->uploadMedia( $accacounttransfer, "file" );

        return $this->transform($accacounttransfer, AccAcountTransferTransformer::class);
    }

    /**
     * @param DeleteAccAcountTransferRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccAcountTransfer(DeleteAccAcountTransferRequest $request)
    {
        Apiato::call('AccAcountTransfer@DeleteAccAcountTransferAction', [$request]);

        return $this->noContent();
    }
}
