<?php

namespace App\Containers\StockOut\UI\API\Controllers;

use App\Containers\StockOut\UI\API\Requests\CreateStockOutRequest;
use App\Containers\StockOut\UI\API\Requests\DeleteStockOutRequest;
use App\Containers\StockOut\UI\API\Requests\GetAllStockOutsRequest;
use App\Containers\StockOut\UI\API\Requests\FindStockOutByIdRequest;
use App\Containers\StockOut\UI\API\Requests\UpdateStockOutRequest;
use App\Containers\StockOut\UI\API\Transformers\StockOutTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\StockOut\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateStockOutRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createStockOut(CreateStockOutRequest $request)
    {
        $stockout = Apiato::call('StockOut@CreateStockOutAction', [$request]);

        $this->uploadMedia( $stockout, "image", true );
        $this->uploadMedia( $stockout, "gallery" );
        $this->uploadMedia( $stockout, "file" );

        return $this->created($this->transform($stockout, StockOutTransformer::class));
    }

    /**
     * @param FindStockOutByIdRequest $request
     * @return array
     */
    public function findStockOutById(FindStockOutByIdRequest $request)
    {
        $stockout = Apiato::call('StockOut@FindStockOutByIdAction', [$request]);

        return $this->transform($stockout, StockOutTransformer::class);
    }

    /**
     * @param GetAllStockOutsRequest $request
     * @return array
     */
    public function getAllStockOuts(GetAllStockOutsRequest $request)
    {
        $stockouts = Apiato::call('StockOut@GetAllStockOutsAction', [$request]);

        return $this->transform($stockouts, StockOutTransformer::class);
    }

    /**
     * @param UpdateStockOutRequest $request
     * @return array
     */
    public function updateStockOut(UpdateStockOutRequest $request)
    {
        $stockout = Apiato::call('StockOut@UpdateStockOutAction', [$request]);

        $this->uploadMedia( $stockout, "image", true );
        $this->uploadMedia( $stockout, "gallery" );
        $this->uploadMedia( $stockout, "file" );

        return $this->transform($stockout, StockOutTransformer::class);
    }

    /**
     * @param DeleteStockOutRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStockOut(DeleteStockOutRequest $request)
    {
        Apiato::call('StockOut@DeleteStockOutAction', [$request]);

        return $this->noContent();
    }
}
