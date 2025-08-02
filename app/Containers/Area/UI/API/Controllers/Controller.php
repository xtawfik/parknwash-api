<?php

namespace App\Containers\Area\UI\API\Controllers;

use App\Containers\Area\UI\API\Requests\CreateAreaRequest;
use App\Containers\Area\UI\API\Requests\DeleteAreaRequest;
use App\Containers\Area\UI\API\Requests\GetAllAreasRequest;
use App\Containers\Area\UI\API\Requests\FindAreaByIdRequest;
use App\Containers\Area\UI\API\Requests\UpdateAreaRequest;
use App\Containers\Area\UI\API\Transformers\AreaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Area\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAreaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createArea(CreateAreaRequest $request)
    {
        $area = Apiato::call('Area@CreateAreaAction', [$request]);

        $this->uploadMedia( $area, "image", true );
        $this->uploadMedia( $area, "gallery" );
        $this->uploadMedia( $area, "file" );

        return $this->created($this->transform($area, AreaTransformer::class));
    }

    /**
     * @param FindAreaByIdRequest $request
     * @return array
     */
    public function findAreaById(FindAreaByIdRequest $request)
    {
        $area = Apiato::call('Area@FindAreaByIdAction', [$request]);

        return $this->transform($area, AreaTransformer::class);
    }

    /**
     * @param GetAllAreasRequest $request
     * @return array
     */
    public function getAllAreas(GetAllAreasRequest $request)
    {
        $areas = Apiato::call('Area@GetAllAreasAction', [$request]);

        return $this->transform($areas, AreaTransformer::class);
    }

    /**
     * @param UpdateAreaRequest $request
     * @return array
     */
    public function updateArea(UpdateAreaRequest $request)
    {
        $area = Apiato::call('Area@UpdateAreaAction', [$request]);

        $this->uploadMedia( $area, "image", true );
        $this->uploadMedia( $area, "gallery" );
        $this->uploadMedia( $area, "file" );

        return $this->transform($area, AreaTransformer::class);
    }

    /**
     * @param DeleteAreaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteArea(DeleteAreaRequest $request)
    {
        Apiato::call('Area@DeleteAreaAction', [$request]);

        return $this->noContent();
    }
}
