<?php

namespace App\Containers\CoverPrice\UI\API\Controllers;

use App\Containers\CoverPrice\UI\API\Requests\CreateCoverPriceRequest;
use App\Containers\CoverPrice\UI\API\Requests\DeleteCoverPriceRequest;
use App\Containers\CoverPrice\UI\API\Requests\GetAllCoverPricesRequest;
use App\Containers\CoverPrice\UI\API\Requests\FindCoverPriceByIdRequest;
use App\Containers\CoverPrice\UI\API\Requests\UpdateCoverPriceRequest;
use App\Containers\CoverPrice\UI\API\Transformers\CoverPriceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CoverPrice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCoverPriceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCoverPrice(CreateCoverPriceRequest $request)
    {
        $coverprice = Apiato::call('CoverPrice@CreateCoverPriceAction', [$request]);

        $this->uploadMedia( $coverprice, "image", true );
        $this->uploadMedia( $coverprice, "gallery" );
        $this->uploadMedia( $coverprice, "file" );

        return $this->created($this->transform($coverprice, CoverPriceTransformer::class));
    }

    /**
     * @param FindCoverPriceByIdRequest $request
     * @return array
     */
    public function findCoverPriceById(FindCoverPriceByIdRequest $request)
    {
        $coverprice = Apiato::call('CoverPrice@FindCoverPriceByIdAction', [$request]);

        return $this->transform($coverprice, CoverPriceTransformer::class);
    }

    /**
     * @param GetAllCoverPricesRequest $request
     * @return array
     */
    public function getAllCoverPrices(GetAllCoverPricesRequest $request)
    {
        $coverprices = Apiato::call('CoverPrice@GetAllCoverPricesAction', [$request]);

        return $this->transform($coverprices, CoverPriceTransformer::class);
    }

    /**
     * @param UpdateCoverPriceRequest $request
     * @return array
     */
    public function updateCoverPrice(UpdateCoverPriceRequest $request)
    {
        $coverprice = Apiato::call('CoverPrice@UpdateCoverPriceAction', [$request]);

        $this->uploadMedia( $coverprice, "image", true );
        $this->uploadMedia( $coverprice, "gallery" );
        $this->uploadMedia( $coverprice, "file" );

        return $this->transform($coverprice, CoverPriceTransformer::class);
    }

    /**
     * @param DeleteCoverPriceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCoverPrice(DeleteCoverPriceRequest $request)
    {
        Apiato::call('CoverPrice@DeleteCoverPriceAction', [$request]);

        return $this->noContent();
    }
}
