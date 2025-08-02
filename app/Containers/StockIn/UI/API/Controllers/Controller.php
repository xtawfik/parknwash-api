<?php

namespace App\Containers\StockIn\UI\API\Controllers;

use App\Containers\StockIn\UI\API\Requests\CreateStockInRequest;
use App\Containers\StockIn\UI\API\Requests\DeleteStockInRequest;
use App\Containers\StockIn\UI\API\Requests\GetAllStockInsRequest;
use App\Containers\StockIn\UI\API\Requests\FindStockInByIdRequest;
use App\Containers\StockIn\UI\API\Requests\UpdateStockInRequest;
use App\Containers\StockIn\UI\API\Transformers\StockInTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\StockIn\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateStockInRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createStockIn(CreateStockInRequest $request)
    {
        $stockin = Apiato::call('StockIn@CreateStockInAction', [$request]);

        $this->uploadMedia( $stockin, "image", true );
        $this->uploadMedia( $stockin, "gallery" );
        $this->uploadMedia( $stockin, "file" );

        return $this->created($this->transform($stockin, StockInTransformer::class));
    }

    /**
     * @param FindStockInByIdRequest $request
     * @return array
     */
    public function findStockInById(FindStockInByIdRequest $request)
    {
        $stockin = Apiato::call('StockIn@FindStockInByIdAction', [$request]);

        return $this->transform($stockin, StockInTransformer::class);
    }

    /**
     * @param GetAllStockInsRequest $request
     * @return array
     */
    public function getAllStockIns(GetAllStockInsRequest $request)
    {
        $stockins = Apiato::call('StockIn@GetAllStockInsAction', [$request]);

        return $this->transform($stockins, StockInTransformer::class);
    }

    /**
     * @param UpdateStockInRequest $request
     * @return array
     */
    public function updateStockIn(UpdateStockInRequest $request)
    {
        $stockin = Apiato::call('StockIn@UpdateStockInAction', [$request]);

        $this->uploadMedia( $stockin, "image", true );
        $this->uploadMedia( $stockin, "gallery" );
        $this->uploadMedia( $stockin, "file" );

        return $this->transform($stockin, StockInTransformer::class);
    }

    /**
     * @param DeleteStockInRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStockIn(DeleteStockInRequest $request)
    {
        Apiato::call('StockIn@DeleteStockInAction', [$request]);

        return $this->noContent();
    }
}
