<?php

namespace App\Containers\AccPayment\UI\API\Controllers;

use App\Containers\AccPayment\UI\API\Requests\CreateAccPaymentRequest;
use App\Containers\AccPayment\UI\API\Requests\DeleteAccPaymentRequest;
use App\Containers\AccPayment\UI\API\Requests\GetAllAccPaymentsRequest;
use App\Containers\AccPayment\UI\API\Requests\FindAccPaymentByIdRequest;
use App\Containers\AccPayment\UI\API\Requests\UpdateAccPaymentRequest;
use App\Containers\AccPayment\UI\API\Transformers\AccPaymentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayment\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayment(CreateAccPaymentRequest $request)
    {
        $accpayment = Apiato::call('AccPayment@CreateAccPaymentAction', [$request]);

        $this->uploadMedia( $accpayment, "image", true );
        $this->uploadMedia( $accpayment, "gallery" );
        $this->uploadMedia( $accpayment, "file" );

        return $this->created($this->transform($accpayment, AccPaymentTransformer::class));
    }

    /**
     * @param FindAccPaymentByIdRequest $request
     * @return array
     */
    public function findAccPaymentById(FindAccPaymentByIdRequest $request)
    {
        $accpayment = Apiato::call('AccPayment@FindAccPaymentByIdAction', [$request]);

        return $this->transform($accpayment, AccPaymentTransformer::class);
    }

    /**
     * @param GetAllAccPaymentsRequest $request
     * @return array
     */
    public function getAllAccPayments(GetAllAccPaymentsRequest $request)
    {
        $accpayments = Apiato::call('AccPayment@GetAllAccPaymentsAction', [$request]);

        return $this->transform($accpayments, AccPaymentTransformer::class);
    }

    /**
     * @param UpdateAccPaymentRequest $request
     * @return array
     */
    public function updateAccPayment(UpdateAccPaymentRequest $request)
    {
        $accpayment = Apiato::call('AccPayment@UpdateAccPaymentAction', [$request]);

        $this->uploadMedia( $accpayment, "image", true );
        $this->uploadMedia( $accpayment, "gallery" );
        $this->uploadMedia( $accpayment, "file" );

        return $this->transform($accpayment, AccPaymentTransformer::class);
    }

    /**
     * @param DeleteAccPaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayment(DeleteAccPaymentRequest $request)
    {
        Apiato::call('AccPayment@DeleteAccPaymentAction', [$request]);

        return $this->noContent();
    }
}
