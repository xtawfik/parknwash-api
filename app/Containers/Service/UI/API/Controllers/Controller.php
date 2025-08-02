<?php

namespace App\Containers\Service\UI\API\Controllers;

use App\Containers\Service\UI\API\Requests\CreateServiceRequest;
use App\Containers\Service\UI\API\Requests\DeleteServiceRequest;
use App\Containers\Service\UI\API\Requests\GetAllServicesRequest;
use App\Containers\Service\UI\API\Requests\FindServiceByIdRequest;
use App\Containers\Service\UI\API\Requests\UpdateServiceRequest;
use App\Containers\Service\UI\API\Transformers\ServiceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Service\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createService(CreateServiceRequest $request)
    {
        $service = Apiato::call('Service@CreateServiceAction', [$request]);

        $this->uploadMedia( $service, "image", true );
        $this->uploadMedia( $service, "gallery" );
        $this->uploadMedia( $service, "file" );

        return $this->created($this->transform($service, ServiceTransformer::class));
    }

    /**
     * @param FindServiceByIdRequest $request
     * @return array
     */
    public function findServiceById(FindServiceByIdRequest $request)
    {
        $service = Apiato::call('Service@FindServiceByIdAction', [$request]);

        return $this->transform($service, ServiceTransformer::class);
    }

    /**
     * @param GetAllServicesRequest $request
     * @return array
     */
    public function getAllServices(GetAllServicesRequest $request)
    {
        $services = Apiato::call('Service@GetAllServicesAction', [$request]);

        return $this->transform($services, ServiceTransformer::class);
    }

    /**
     * @param UpdateServiceRequest $request
     * @return array
     */
    public function updateService(UpdateServiceRequest $request)
    {
        $service = Apiato::call('Service@UpdateServiceAction', [$request]);

        $this->uploadMedia( $service, "image", true );
        $this->uploadMedia( $service, "gallery" );
        $this->uploadMedia( $service, "file" );

        return $this->transform($service, ServiceTransformer::class);
    }

    /**
     * @param DeleteServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteService(DeleteServiceRequest $request)
    {
        Apiato::call('Service@DeleteServiceAction', [$request]);

        return $this->noContent();
    }
}
