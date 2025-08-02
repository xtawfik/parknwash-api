<?php

namespace App\Containers\Mall\UI\API\Controllers;

use App\Containers\Mall\UI\API\Requests\CreateMallRequest;
use App\Containers\Mall\UI\API\Requests\DeleteMallRequest;
use App\Containers\Mall\UI\API\Requests\GetAllMallsRequest;
use App\Containers\Mall\UI\API\Requests\FindMallByIdRequest;
use App\Containers\Mall\UI\API\Requests\UpdateMallRequest;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Mall\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMallRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMall(CreateMallRequest $request)
    {
        $mall = Apiato::call('Mall@CreateMallAction', [$request]);

        $this->uploadMedia( $mall, "image", true );
        $this->uploadMedia( $mall, "gallery" );
        $this->uploadMedia( $mall, "file" );

        return $this->created($this->transform($mall, MallTransformer::class));
    }

    /**
     * @param FindMallByIdRequest $request
     * @return array
     */
    public function findMallById(FindMallByIdRequest $request)
    {
        $mall = Apiato::call('Mall@FindMallByIdAction', [$request]);

        return $this->transform($mall, MallTransformer::class);
    }

    /**
     * @param GetAllMallsRequest $request
     * @return array
     */
    public function getAllMalls(GetAllMallsRequest $request)
    {
        $malls = Apiato::call('Mall@GetAllMallsAction', [$request]);

        return $this->transform($malls, MallTransformer::class);
    }

    /**
     * @param UpdateMallRequest $request
     * @return array
     */
    public function updateMall(UpdateMallRequest $request)
    {
        $mall = Apiato::call('Mall@UpdateMallAction', [$request]);

        $this->uploadMedia( $mall, "image", true );
        $this->uploadMedia( $mall, "gallery" );
        $this->uploadMedia( $mall, "file" );

        return $this->transform($mall, MallTransformer::class);
    }

    /**
     * @param DeleteMallRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMall(DeleteMallRequest $request)
    {
        Apiato::call('Mall@DeleteMallAction', [$request]);

        return $this->noContent();
    }
}
