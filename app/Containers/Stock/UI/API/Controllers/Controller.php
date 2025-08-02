<?php

namespace App\Containers\Stock\UI\API\Controllers;

use App\Containers\Stock\UI\API\Requests\CreateStockRequest;
use App\Containers\Stock\UI\API\Requests\DeleteStockRequest;
use App\Containers\Stock\UI\API\Requests\GetAllStocksRequest;
use App\Containers\Stock\UI\API\Requests\FindStockByIdRequest;
use App\Containers\Stock\UI\API\Requests\UpdateStockRequest;
use App\Containers\Stock\UI\API\Transformers\StockTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Stock\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateStockRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createStock(CreateStockRequest $request)
    {
        $stock = Apiato::call('Stock@CreateStockAction', [$request]);

        $this->uploadMedia( $stock, "image", true );
        $this->uploadMedia( $stock, "gallery" );
        $this->uploadMedia( $stock, "file" );

        return $this->created($this->transform($stock, StockTransformer::class));
    }

    /**
     * @param FindStockByIdRequest $request
     * @return array
     */
    public function findStockById(FindStockByIdRequest $request)
    {
        $stock = Apiato::call('Stock@FindStockByIdAction', [$request]);

        return $this->transform($stock, StockTransformer::class);
    }

    /**
     * @param GetAllStocksRequest $request
     * @return array
     */
    public function getAllStocks(GetAllStocksRequest $request)
    {
        $stocks = Apiato::call('Stock@GetAllStocksAction', [$request]);

        return $this->transform($stocks, StockTransformer::class);
    }

    /**
     * @param UpdateStockRequest $request
     * @return array
     */
    public function updateStock(UpdateStockRequest $request)
    {
        $stock = Apiato::call('Stock@UpdateStockAction', [$request]);

        $this->uploadMedia( $stock, "image", true );
        $this->uploadMedia( $stock, "gallery" );
        $this->uploadMedia( $stock, "file" );

        return $this->transform($stock, StockTransformer::class);
    }

    /**
     * @param DeleteStockRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStock(DeleteStockRequest $request)
    {
        Apiato::call('Stock@DeleteStockAction', [$request]);

        return $this->noContent();
    }
}
