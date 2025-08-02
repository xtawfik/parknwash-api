<?php

namespace App\Containers\OrderCover\UI\API\Controllers;

use App\Containers\OrderCover\UI\API\Requests\CreateOrderCoverRequest;
use App\Containers\OrderCover\UI\API\Requests\DeleteOrderCoverRequest;
use App\Containers\OrderCover\UI\API\Requests\GetAllOrderCoversRequest;
use App\Containers\OrderCover\UI\API\Requests\FindOrderCoverByIdRequest;
use App\Containers\OrderCover\UI\API\Requests\UpdateOrderCoverRequest;
use App\Containers\OrderCover\UI\API\Transformers\OrderCoverTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OrderCover\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrderCover(CreateOrderCoverRequest $request)
    {
        $ordercover = Apiato::call('OrderCover@CreateOrderCoverAction', [$request]);

        $this->uploadMedia( $ordercover, "image", true );
        $this->uploadMedia( $ordercover, "gallery" );
        $this->uploadMedia( $ordercover, "file" );

        return $this->created($this->transform($ordercover, OrderCoverTransformer::class));
    }

    /**
     * @param FindOrderCoverByIdRequest $request
     * @return array
     */
    public function findOrderCoverById(FindOrderCoverByIdRequest $request)
    {
        $ordercover = Apiato::call('OrderCover@FindOrderCoverByIdAction', [$request]);

        return $this->transform($ordercover, OrderCoverTransformer::class);
    }

    /**
     * @param GetAllOrderCoversRequest $request
     * @return array
     */
    public function getAllOrderCovers(GetAllOrderCoversRequest $request)
    {
        $ordercovers = Apiato::call('OrderCover@GetAllOrderCoversAction', [$request]);

        return $this->transform($ordercovers, OrderCoverTransformer::class);
    }

    /**
     * @param UpdateOrderCoverRequest $request
     * @return array
     */
    public function updateOrderCover(UpdateOrderCoverRequest $request)
    {
        $ordercover = Apiato::call('OrderCover@UpdateOrderCoverAction', [$request]);

        $this->uploadMedia( $ordercover, "image", true );
        $this->uploadMedia( $ordercover, "gallery" );
        $this->uploadMedia( $ordercover, "file" );

        return $this->transform($ordercover, OrderCoverTransformer::class);
    }

    /**
     * @param DeleteOrderCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrderCover(DeleteOrderCoverRequest $request)
    {
        Apiato::call('OrderCover@DeleteOrderCoverAction', [$request]);

        return $this->noContent();
    }
}
