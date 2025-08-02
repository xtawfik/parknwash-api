<?php

namespace App\Containers\Cover\UI\API\Controllers;

use App\Containers\Cover\UI\API\Requests\CreateCoverRequest;
use App\Containers\Cover\UI\API\Requests\DeleteCoverRequest;
use App\Containers\Cover\UI\API\Requests\GetAllCoversRequest;
use App\Containers\Cover\UI\API\Requests\FindCoverByIdRequest;
use App\Containers\Cover\UI\API\Requests\UpdateCoverRequest;
use App\Containers\Cover\UI\API\Transformers\CoverTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Cover\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCover(CreateCoverRequest $request)
    {
        $cover = Apiato::call('Cover@CreateCoverAction', [$request]);

        $this->uploadMedia( $cover, "image", true );
        $this->uploadMedia( $cover, "gallery" );
        $this->uploadMedia( $cover, "file" );

        return $this->created($this->transform($cover, CoverTransformer::class));
    }

    /**
     * @param FindCoverByIdRequest $request
     * @return array
     */
    public function findCoverById(FindCoverByIdRequest $request)
    {
        $cover = Apiato::call('Cover@FindCoverByIdAction', [$request]);

        return $this->transform($cover, CoverTransformer::class);
    }

    /**
     * @param GetAllCoversRequest $request
     * @return array
     */
    public function getAllCovers(GetAllCoversRequest $request)
    {
        $covers = Apiato::call('Cover@GetAllCoversAction', [$request]);

        return $this->transform($covers, CoverTransformer::class);
    }

    /**
     * @param UpdateCoverRequest $request
     * @return array
     */
    public function updateCover(UpdateCoverRequest $request)
    {
        $cover = Apiato::call('Cover@UpdateCoverAction', [$request]);

        $this->uploadMedia( $cover, "image", true );
        $this->uploadMedia( $cover, "gallery" );
        $this->uploadMedia( $cover, "file" );

        return $this->transform($cover, CoverTransformer::class);
    }

    /**
     * @param DeleteCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCover(DeleteCoverRequest $request)
    {
        Apiato::call('Cover@DeleteCoverAction', [$request]);

        return $this->noContent();
    }
}
