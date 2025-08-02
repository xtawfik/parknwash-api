<?php

namespace App\Containers\Request\UI\API\Controllers;

use App\Containers\Request\UI\API\Requests\CreateRequestRequest;
use App\Containers\Request\UI\API\Requests\DeleteRequestRequest;
use App\Containers\Request\UI\API\Requests\GetAllRequestsRequest;
use App\Containers\Request\UI\API\Requests\FindRequestByIdRequest;
use App\Containers\Request\UI\API\Requests\UpdateRequestRequest;
use App\Containers\Request\UI\API\Transformers\RequestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Request\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateRequestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRequest(CreateRequestRequest $request)
    {
        $request = Apiato::call('Request@CreateRequestAction', [$request]);

        $this->uploadMedia( $request, "image", true );
        $this->uploadMedia( $request, "gallery" );
        $this->uploadMedia( $request, "file" );

        return $this->created($this->transform($request, RequestTransformer::class));
    }

    /**
     * @param FindRequestByIdRequest $request
     * @return array
     */
    public function findRequestById(FindRequestByIdRequest $request)
    {
        $request = Apiato::call('Request@FindRequestByIdAction', [$request]);

        return $this->transform($request, RequestTransformer::class);
    }

    /**
     * @param GetAllRequestsRequest $request
     * @return array
     */
    public function getAllRequests(GetAllRequestsRequest $request)
    {
        $requests = Apiato::call('Request@GetAllRequestsAction', [$request]);

        return $this->transform($requests, RequestTransformer::class);
    }

    /**
     * @param UpdateRequestRequest $request
     * @return array
     */
    public function updateRequest(UpdateRequestRequest $request)
    {
        $request = Apiato::call('Request@UpdateRequestAction', [$request]);

        $this->uploadMedia( $request, "image", true );
        $this->uploadMedia( $request, "gallery" );
        $this->uploadMedia( $request, "file" );

        return $this->transform($request, RequestTransformer::class);
    }

    /**
     * @param DeleteRequestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRequest(DeleteRequestRequest $request)
    {
        Apiato::call('Request@DeleteRequestAction', [$request]);

        return $this->noContent();
    }
}
