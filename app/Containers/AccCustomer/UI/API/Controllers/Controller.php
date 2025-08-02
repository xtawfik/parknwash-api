<?php

namespace App\Containers\AccCustomer\UI\API\Controllers;

use App\Containers\AccCustomer\UI\API\Requests\CreateAccCustomerRequest;
use App\Containers\AccCustomer\UI\API\Requests\DeleteAccCustomerRequest;
use App\Containers\AccCustomer\UI\API\Requests\GetAllAccCustomersRequest;
use App\Containers\AccCustomer\UI\API\Requests\FindAccCustomerByIdRequest;
use App\Containers\AccCustomer\UI\API\Requests\UpdateAccCustomerRequest;
use App\Containers\AccCustomer\UI\API\Transformers\AccCustomerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCustomer\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCustomer(CreateAccCustomerRequest $request)
    {
        $acccustomer = Apiato::call('AccCustomer@CreateAccCustomerAction', [$request]);

        $this->uploadMedia( $acccustomer, "image", true );
        $this->uploadMedia( $acccustomer, "gallery" );
        $this->uploadMedia( $acccustomer, "file" );

        return $this->created($this->transform($acccustomer, AccCustomerTransformer::class));
    }

    /**
     * @param FindAccCustomerByIdRequest $request
     * @return array
     */
    public function findAccCustomerById(FindAccCustomerByIdRequest $request)
    {
        $acccustomer = Apiato::call('AccCustomer@FindAccCustomerByIdAction', [$request]);

        return $this->transform($acccustomer, AccCustomerTransformer::class);
    }

    /**
     * @param GetAllAccCustomersRequest $request
     * @return array
     */
    public function getAllAccCustomers(GetAllAccCustomersRequest $request)
    {
        $acccustomers = Apiato::call('AccCustomer@GetAllAccCustomersAction', [$request]);

        return $this->transform($acccustomers, AccCustomerTransformer::class);
    }

    /**
     * @param UpdateAccCustomerRequest $request
     * @return array
     */
    public function updateAccCustomer(UpdateAccCustomerRequest $request)
    {
        $acccustomer = Apiato::call('AccCustomer@UpdateAccCustomerAction', [$request]);

        $this->uploadMedia( $acccustomer, "image", true );
        $this->uploadMedia( $acccustomer, "gallery" );
        $this->uploadMedia( $acccustomer, "file" );

        return $this->transform($acccustomer, AccCustomerTransformer::class);
    }

    /**
     * @param DeleteAccCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCustomer(DeleteAccCustomerRequest $request)
    {
        Apiato::call('AccCustomer@DeleteAccCustomerAction', [$request]);

        return $this->noContent();
    }
}
