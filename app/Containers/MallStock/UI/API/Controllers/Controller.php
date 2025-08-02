<?php

namespace App\Containers\MallStock\UI\API\Controllers;

use App\Containers\MallStock\UI\API\Requests\CreateMallStockRequest;
use App\Containers\MallStock\UI\API\Requests\DeleteMallStockRequest;
use App\Containers\MallStock\UI\API\Requests\GetAllMallStocksRequest;
use App\Containers\MallStock\UI\API\Requests\FindMallStockByIdRequest;
use App\Containers\MallStock\UI\API\Requests\UpdateMallStockRequest;
use App\Containers\MallStock\UI\API\Transformers\MallStockTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\MallStock\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMallStockRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMallStock(CreateMallStockRequest $request)
    {
        $mallstock = Apiato::call('MallStock@CreateMallStockAction', [$request]);

        $this->uploadMedia( $mallstock, "image", true );
        $this->uploadMedia( $mallstock, "gallery" );
        $this->uploadMedia( $mallstock, "file" );

        return $this->created($this->transform($mallstock, MallStockTransformer::class));
    }

    /**
     * @param FindMallStockByIdRequest $request
     * @return array
     */
    public function findMallStockById(FindMallStockByIdRequest $request)
    {
        $mallstock = Apiato::call('MallStock@FindMallStockByIdAction', [$request]);

        return $this->transform($mallstock, MallStockTransformer::class);
    }

    /**
     * @param GetAllMallStocksRequest $request
     * @return array
     */
    public function getAllMallStocks(GetAllMallStocksRequest $request)
    {
        $mallstocks = Apiato::call('MallStock@GetAllMallStocksAction', [$request]);

        return $this->transform($mallstocks, MallStockTransformer::class);
    }

    /**
     * @param UpdateMallStockRequest $request
     * @return array
     */
    public function updateMallStock(UpdateMallStockRequest $request)
    {
        $mallstock = Apiato::call('MallStock@UpdateMallStockAction', [$request]);

        $this->uploadMedia( $mallstock, "image", true );
        $this->uploadMedia( $mallstock, "gallery" );
        $this->uploadMedia( $mallstock, "file" );

        return $this->transform($mallstock, MallStockTransformer::class);
    }

    /**
     * @param DeleteMallStockRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMallStock(DeleteMallStockRequest $request)
    {
        Apiato::call('MallStock@DeleteMallStockAction', [$request]);

        return $this->noContent();
    }
}
