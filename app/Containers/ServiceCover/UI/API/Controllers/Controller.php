<?php

namespace App\Containers\ServiceCover\UI\API\Controllers;

use App\Containers\ServiceCover\UI\API\Requests\CreateServiceCoverRequest;
use App\Containers\ServiceCover\UI\API\Requests\DeleteServiceCoverRequest;
use App\Containers\ServiceCover\UI\API\Requests\GetAllServiceCoversRequest;
use App\Containers\ServiceCover\UI\API\Requests\FindServiceCoverByIdRequest;
use App\Containers\ServiceCover\UI\API\Requests\UpdateServiceCoverRequest;
use App\Containers\ServiceCover\UI\API\Transformers\ServiceCoverTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ServiceCover\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateServiceCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createServiceCover(CreateServiceCoverRequest $request)
    {
        $servicecover = Apiato::call('ServiceCover@CreateServiceCoverAction', [$request]);

        $this->uploadMedia( $servicecover, "image", true );
        $this->uploadMedia( $servicecover, "gallery" );
        $this->uploadMedia( $servicecover, "file" );

        return $this->created($this->transform($servicecover, ServiceCoverTransformer::class));
    }

    /**
     * @param FindServiceCoverByIdRequest $request
     * @return array
     */
    public function findServiceCoverById(FindServiceCoverByIdRequest $request)
    {
        $servicecover = Apiato::call('ServiceCover@FindServiceCoverByIdAction', [$request]);

        return $this->transform($servicecover, ServiceCoverTransformer::class);
    }

    /**
     * @param GetAllServiceCoversRequest $request
     * @return array
     */
    public function getAllServiceCovers(GetAllServiceCoversRequest $request)
    {
        $servicecovers = Apiato::call('ServiceCover@GetAllServiceCoversAction', [$request]);

        return $this->transform($servicecovers, ServiceCoverTransformer::class);
    }

    /**
     * @param UpdateServiceCoverRequest $request
     * @return array
     */
    public function updateServiceCover(UpdateServiceCoverRequest $request)
    {
        $servicecover = Apiato::call('ServiceCover@UpdateServiceCoverAction', [$request]);

        $this->uploadMedia( $servicecover, "image", true );
        $this->uploadMedia( $servicecover, "gallery" );
        $this->uploadMedia( $servicecover, "file" );

        return $this->transform($servicecover, ServiceCoverTransformer::class);
    }

    /**
     * @param DeleteServiceCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteServiceCover(DeleteServiceCoverRequest $request)
    {
        Apiato::call('ServiceCover@DeleteServiceCoverAction', [$request]);

        return $this->noContent();
    }
}
