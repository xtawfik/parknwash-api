<?php

namespace App\Containers\DamageRequest\UI\API\Controllers;

use App\Containers\DamageRequest\UI\API\Requests\CreateDamageRequestRequest;
use App\Containers\DamageRequest\UI\API\Requests\DeleteDamageRequestRequest;
use App\Containers\DamageRequest\UI\API\Requests\GetAllDamageRequestsRequest;
use App\Containers\DamageRequest\UI\API\Requests\FindDamageRequestByIdRequest;
use App\Containers\DamageRequest\UI\API\Requests\UpdateDamageRequestRequest;
use App\Containers\DamageRequest\UI\API\Transformers\DamageRequestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\DamageRequest\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDamageRequestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDamageRequest(CreateDamageRequestRequest $request)
    {
        $damagerequest = Apiato::call('DamageRequest@CreateDamageRequestAction', [$request]);

        $this->uploadMedia( $damagerequest, "image", true );
        $this->uploadMedia( $damagerequest, "gallery" );
        $this->uploadMedia( $damagerequest, "file" );

        return $this->created($this->transform($damagerequest, DamageRequestTransformer::class));
    }

    /**
     * @param FindDamageRequestByIdRequest $request
     * @return array
     */
    public function findDamageRequestById(FindDamageRequestByIdRequest $request)
    {
        $damagerequest = Apiato::call('DamageRequest@FindDamageRequestByIdAction', [$request]);

        return $this->transform($damagerequest, DamageRequestTransformer::class);
    }

    /**
     * @param GetAllDamageRequestsRequest $request
     * @return array
     */
    public function getAllDamageRequests(GetAllDamageRequestsRequest $request)
    {
        $damagerequests = Apiato::call('DamageRequest@GetAllDamageRequestsAction', [$request]);

        return $this->transform($damagerequests, DamageRequestTransformer::class);
    }

    /**
     * @param UpdateDamageRequestRequest $request
     * @return array
     */
    public function updateDamageRequest(UpdateDamageRequestRequest $request)
    {
        $damagerequest = Apiato::call('DamageRequest@UpdateDamageRequestAction', [$request]);

        $this->uploadMedia( $damagerequest, "image", true );
        $this->uploadMedia( $damagerequest, "gallery" );
        $this->uploadMedia( $damagerequest, "file" );

        return $this->transform($damagerequest, DamageRequestTransformer::class);
    }

    /**
     * @param DeleteDamageRequestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDamageRequest(DeleteDamageRequestRequest $request)
    {
        Apiato::call('DamageRequest@DeleteDamageRequestAction', [$request]);

        return $this->noContent();
    }
}
