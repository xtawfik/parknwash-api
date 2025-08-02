<?php

namespace App\Containers\ServiceType\UI\API\Controllers;

use App\Containers\ServiceType\UI\API\Requests\CreateServiceTypeRequest;
use App\Containers\ServiceType\UI\API\Requests\DeleteServiceTypeRequest;
use App\Containers\ServiceType\UI\API\Requests\GetAllServiceTypesRequest;
use App\Containers\ServiceType\UI\API\Requests\FindServiceTypeByIdRequest;
use App\Containers\ServiceType\UI\API\Requests\UpdateServiceTypeRequest;
use App\Containers\ServiceType\UI\API\Transformers\ServiceTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ServiceType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateServiceTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createServiceType(CreateServiceTypeRequest $request)
    {
        $servicetype = Apiato::call('ServiceType@CreateServiceTypeAction', [$request]);

        $this->uploadMedia( $servicetype, "image", true );
        $this->uploadMedia( $servicetype, "gallery" );
        $this->uploadMedia( $servicetype, "file" );

        return $this->created($this->transform($servicetype, ServiceTypeTransformer::class));
    }

    /**
     * @param FindServiceTypeByIdRequest $request
     * @return array
     */
    public function findServiceTypeById(FindServiceTypeByIdRequest $request)
    {
        $servicetype = Apiato::call('ServiceType@FindServiceTypeByIdAction', [$request]);

        return $this->transform($servicetype, ServiceTypeTransformer::class);
    }

    /**
     * @param GetAllServiceTypesRequest $request
     * @return array
     */
    public function getAllServiceTypes(GetAllServiceTypesRequest $request)
    {
        $servicetypes = Apiato::call('ServiceType@GetAllServiceTypesAction', [$request]);

        return $this->transform($servicetypes, ServiceTypeTransformer::class);
    }

    /**
     * @param UpdateServiceTypeRequest $request
     * @return array
     */
    public function updateServiceType(UpdateServiceTypeRequest $request)
    {
        $servicetype = Apiato::call('ServiceType@UpdateServiceTypeAction', [$request]);

        $this->uploadMedia( $servicetype, "image", true );
        $this->uploadMedia( $servicetype, "gallery" );
        $this->uploadMedia( $servicetype, "file" );

        return $this->transform($servicetype, ServiceTypeTransformer::class);
    }

    /**
     * @param DeleteServiceTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteServiceType(DeleteServiceTypeRequest $request)
    {
        Apiato::call('ServiceType@DeleteServiceTypeAction', [$request]);

        return $this->noContent();
    }
}
