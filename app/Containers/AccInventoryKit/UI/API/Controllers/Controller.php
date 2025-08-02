<?php

namespace App\Containers\AccInventoryKit\UI\API\Controllers;

use App\Containers\AccInventoryKit\UI\API\Requests\CreateAccInventoryKitRequest;
use App\Containers\AccInventoryKit\UI\API\Requests\DeleteAccInventoryKitRequest;
use App\Containers\AccInventoryKit\UI\API\Requests\GetAllAccInventoryKitsRequest;
use App\Containers\AccInventoryKit\UI\API\Requests\FindAccInventoryKitByIdRequest;
use App\Containers\AccInventoryKit\UI\API\Requests\UpdateAccInventoryKitRequest;
use App\Containers\AccInventoryKit\UI\API\Transformers\AccInventoryKitTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventoryKit\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryKitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventoryKit(CreateAccInventoryKitRequest $request)
    {
        $accinventorykit = Apiato::call('AccInventoryKit@CreateAccInventoryKitAction', [$request]);

        $this->uploadMedia( $accinventorykit, "image", true );
        $this->uploadMedia( $accinventorykit, "gallery" );
        $this->uploadMedia( $accinventorykit, "file" );

        return $this->created($this->transform($accinventorykit, AccInventoryKitTransformer::class));
    }

    /**
     * @param FindAccInventoryKitByIdRequest $request
     * @return array
     */
    public function findAccInventoryKitById(FindAccInventoryKitByIdRequest $request)
    {
        $accinventorykit = Apiato::call('AccInventoryKit@FindAccInventoryKitByIdAction', [$request]);

        return $this->transform($accinventorykit, AccInventoryKitTransformer::class);
    }

    /**
     * @param GetAllAccInventoryKitsRequest $request
     * @return array
     */
    public function getAllAccInventoryKits(GetAllAccInventoryKitsRequest $request)
    {
        $accinventorykits = Apiato::call('AccInventoryKit@GetAllAccInventoryKitsAction', [$request]);

        return $this->transform($accinventorykits, AccInventoryKitTransformer::class);
    }

    /**
     * @param UpdateAccInventoryKitRequest $request
     * @return array
     */
    public function updateAccInventoryKit(UpdateAccInventoryKitRequest $request)
    {
        $accinventorykit = Apiato::call('AccInventoryKit@UpdateAccInventoryKitAction', [$request]);

        $this->uploadMedia( $accinventorykit, "image", true );
        $this->uploadMedia( $accinventorykit, "gallery" );
        $this->uploadMedia( $accinventorykit, "file" );

        return $this->transform($accinventorykit, AccInventoryKitTransformer::class);
    }

    /**
     * @param DeleteAccInventoryKitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventoryKit(DeleteAccInventoryKitRequest $request)
    {
        Apiato::call('AccInventoryKit@DeleteAccInventoryKitAction', [$request]);

        return $this->noContent();
    }
}
