<?php

namespace App\Containers\Damaged\UI\API\Controllers;

use App\Containers\Damaged\UI\API\Requests\CreateDamagedRequest;
use App\Containers\Damaged\UI\API\Requests\DeleteDamagedRequest;
use App\Containers\Damaged\UI\API\Requests\GetAllDamagedsRequest;
use App\Containers\Damaged\UI\API\Requests\FindDamagedByIdRequest;
use App\Containers\Damaged\UI\API\Requests\UpdateDamagedRequest;
use App\Containers\Damaged\UI\API\Transformers\DamagedTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Damaged\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDamagedRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDamaged(CreateDamagedRequest $request)
    {
        $damaged = Apiato::call('Damaged@CreateDamagedAction', [$request]);

        $this->uploadMedia( $damaged, "image", true );
        $this->uploadMedia( $damaged, "gallery" );
        $this->uploadMedia( $damaged, "file" );

        return $this->created($this->transform($damaged, DamagedTransformer::class));
    }

    /**
     * @param FindDamagedByIdRequest $request
     * @return array
     */
    public function findDamagedById(FindDamagedByIdRequest $request)
    {
        $damaged = Apiato::call('Damaged@FindDamagedByIdAction', [$request]);

        return $this->transform($damaged, DamagedTransformer::class);
    }

    /**
     * @param GetAllDamagedsRequest $request
     * @return array
     */
    public function getAllDamageds(GetAllDamagedsRequest $request)
    {
        $damageds = Apiato::call('Damaged@GetAllDamagedsAction', [$request]);

        return $this->transform($damageds, DamagedTransformer::class);
    }

    /**
     * @param UpdateDamagedRequest $request
     * @return array
     */
    public function updateDamaged(UpdateDamagedRequest $request)
    {
        $damaged = Apiato::call('Damaged@UpdateDamagedAction', [$request]);

        $this->uploadMedia( $damaged, "image", true );
        $this->uploadMedia( $damaged, "gallery" );
        $this->uploadMedia( $damaged, "file" );

        return $this->transform($damaged, DamagedTransformer::class);
    }

    /**
     * @param DeleteDamagedRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDamaged(DeleteDamagedRequest $request)
    {
        Apiato::call('Damaged@DeleteDamagedAction', [$request]);

        return $this->noContent();
    }
}
