<?php

namespace App\Containers\AccLatePayment\UI\API\Controllers;

use App\Containers\AccLatePayment\UI\API\Requests\CreateAccLatePaymentRequest;
use App\Containers\AccLatePayment\UI\API\Requests\DeleteAccLatePaymentRequest;
use App\Containers\AccLatePayment\UI\API\Requests\GetAllAccLatePaymentsRequest;
use App\Containers\AccLatePayment\UI\API\Requests\FindAccLatePaymentByIdRequest;
use App\Containers\AccLatePayment\UI\API\Requests\UpdateAccLatePaymentRequest;
use App\Containers\AccLatePayment\UI\API\Transformers\AccLatePaymentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccLatePayment\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccLatePaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccLatePayment(CreateAccLatePaymentRequest $request)
    {
        $acclatepayment = Apiato::call('AccLatePayment@CreateAccLatePaymentAction', [$request]);

        $this->uploadMedia( $acclatepayment, "image", true );
        $this->uploadMedia( $acclatepayment, "gallery" );
        $this->uploadMedia( $acclatepayment, "file" );

        return $this->created($this->transform($acclatepayment, AccLatePaymentTransformer::class));
    }

    /**
     * @param FindAccLatePaymentByIdRequest $request
     * @return array
     */
    public function findAccLatePaymentById(FindAccLatePaymentByIdRequest $request)
    {
        $acclatepayment = Apiato::call('AccLatePayment@FindAccLatePaymentByIdAction', [$request]);

        return $this->transform($acclatepayment, AccLatePaymentTransformer::class);
    }

    /**
     * @param GetAllAccLatePaymentsRequest $request
     * @return array
     */
    public function getAllAccLatePayments(GetAllAccLatePaymentsRequest $request)
    {
        $acclatepayments = Apiato::call('AccLatePayment@GetAllAccLatePaymentsAction', [$request]);

        return $this->transform($acclatepayments, AccLatePaymentTransformer::class);
    }

    /**
     * @param UpdateAccLatePaymentRequest $request
     * @return array
     */
    public function updateAccLatePayment(UpdateAccLatePaymentRequest $request)
    {
        $acclatepayment = Apiato::call('AccLatePayment@UpdateAccLatePaymentAction', [$request]);

        $this->uploadMedia( $acclatepayment, "image", true );
        $this->uploadMedia( $acclatepayment, "gallery" );
        $this->uploadMedia( $acclatepayment, "file" );

        return $this->transform($acclatepayment, AccLatePaymentTransformer::class);
    }

    /**
     * @param DeleteAccLatePaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccLatePayment(DeleteAccLatePaymentRequest $request)
    {
        Apiato::call('AccLatePayment@DeleteAccLatePaymentAction', [$request]);

        return $this->noContent();
    }
}
