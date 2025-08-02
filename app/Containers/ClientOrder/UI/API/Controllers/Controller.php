<?php

namespace App\Containers\ClientOrder\UI\API\Controllers;

use App\Containers\ClientOrder\UI\API\Requests\CreateClientOrderRequest;
use App\Containers\ClientOrder\UI\API\Requests\DeleteClientOrderRequest;
use App\Containers\ClientOrder\UI\API\Requests\GetAllClientOrdersRequest;
use App\Containers\ClientOrder\UI\API\Requests\FindClientOrderByIdRequest;
use App\Containers\ClientOrder\UI\API\Requests\UpdateClientOrderRequest;
use App\Containers\ClientOrder\UI\API\Transformers\ClientOrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ClientOrder\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateClientOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createClientOrder(CreateClientOrderRequest $request)
    {
        $clientorder = Apiato::call('ClientOrder@CreateClientOrderAction', [$request]);

        $this->uploadMedia( $clientorder, "image", true );
        $this->uploadMedia( $clientorder, "gallery" );
        $this->uploadMedia( $clientorder, "file" );

        return $this->created($this->transform($clientorder, ClientOrderTransformer::class));
    }

    /**
     * @param FindClientOrderByIdRequest $request
     * @return array
     */
    public function findClientOrderById(FindClientOrderByIdRequest $request)
    {
        $clientorder = Apiato::call('ClientOrder@FindClientOrderByIdAction', [$request]);

        return $this->transform($clientorder, ClientOrderTransformer::class);
    }

    /**
     * @param GetAllClientOrdersRequest $request
     * @return array
     */
    public function getAllClientOrders(GetAllClientOrdersRequest $request)
    {
        $clientorders = Apiato::call('ClientOrder@GetAllClientOrdersAction', [$request]);

        return $this->transform($clientorders, ClientOrderTransformer::class);
    }

    /**
     * @param UpdateClientOrderRequest $request
     * @return array
     */
    public function updateClientOrder(UpdateClientOrderRequest $request)
    {
        $clientorder = Apiato::call('ClientOrder@UpdateClientOrderAction', [$request]);

        $this->uploadMedia( $clientorder, "image", true );
        $this->uploadMedia( $clientorder, "gallery" );
        $this->uploadMedia( $clientorder, "file" );

        return $this->transform($clientorder, ClientOrderTransformer::class);
    }

    /**
     * @param DeleteClientOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteClientOrder(DeleteClientOrderRequest $request)
    {
        Apiato::call('ClientOrder@DeleteClientOrderAction', [$request]);

        return $this->noContent();
    }
}
