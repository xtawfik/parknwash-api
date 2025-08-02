<?php

namespace App\Containers\PaymentMethod\UI\API\Controllers;

use App\Containers\PaymentMethod\UI\API\Requests\CreatePaymentMethodRequest;
use App\Containers\PaymentMethod\UI\API\Requests\DeletePaymentMethodRequest;
use App\Containers\PaymentMethod\UI\API\Requests\GetAllPaymentMethodsRequest;
use App\Containers\PaymentMethod\UI\API\Requests\FindPaymentMethodByIdRequest;
use App\Containers\PaymentMethod\UI\API\Requests\UpdatePaymentMethodRequest;
use App\Containers\PaymentMethod\UI\API\Transformers\PaymentMethodTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\PaymentMethod\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePaymentMethodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPaymentMethod(CreatePaymentMethodRequest $request)
    {
        $paymentmethod = Apiato::call('PaymentMethod@CreatePaymentMethodAction', [$request]);

        $this->uploadMedia( $paymentmethod, "image", true );
        $this->uploadMedia( $paymentmethod, "gallery" );
        $this->uploadMedia( $paymentmethod, "file" );

        return $this->created($this->transform($paymentmethod, PaymentMethodTransformer::class));
    }

    /**
     * @param FindPaymentMethodByIdRequest $request
     * @return array
     */
    public function findPaymentMethodById(FindPaymentMethodByIdRequest $request)
    {
        $paymentmethod = Apiato::call('PaymentMethod@FindPaymentMethodByIdAction', [$request]);

        return $this->transform($paymentmethod, PaymentMethodTransformer::class);
    }

    /**
     * @param GetAllPaymentMethodsRequest $request
     * @return array
     */
    public function getAllPaymentMethods(GetAllPaymentMethodsRequest $request)
    {
        $paymentmethods = Apiato::call('PaymentMethod@GetAllPaymentMethodsAction', [$request]);

        return $this->transform($paymentmethods, PaymentMethodTransformer::class);
    }

    /**
     * @param UpdatePaymentMethodRequest $request
     * @return array
     */
    public function updatePaymentMethod(UpdatePaymentMethodRequest $request)
    {
        $paymentmethod = Apiato::call('PaymentMethod@UpdatePaymentMethodAction', [$request]);

        $this->uploadMedia( $paymentmethod, "image", true );
        $this->uploadMedia( $paymentmethod, "gallery" );
        $this->uploadMedia( $paymentmethod, "file" );

        return $this->transform($paymentmethod, PaymentMethodTransformer::class);
    }

    /**
     * @param DeletePaymentMethodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePaymentMethod(DeletePaymentMethodRequest $request)
    {
        Apiato::call('PaymentMethod@DeletePaymentMethodAction', [$request]);

        return $this->noContent();
    }
}
