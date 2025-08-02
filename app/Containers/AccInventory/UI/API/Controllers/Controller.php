<?php

namespace App\Containers\AccInventory\UI\API\Controllers;

use App\Containers\AccInventory\UI\API\Requests\CreateAccInventoryRequest;
use App\Containers\AccInventory\UI\API\Requests\DeleteAccInventoryRequest;
use App\Containers\AccInventory\UI\API\Requests\GetAllAccInventoriesRequest;
use App\Containers\AccInventory\UI\API\Requests\FindAccInventoryByIdRequest;
use App\Containers\AccInventory\UI\API\Requests\UpdateAccInventoryRequest;
use App\Containers\AccInventory\UI\API\Transformers\AccInventoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventory\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventory(CreateAccInventoryRequest $request)
    {
        $accinventory = Apiato::call('AccInventory@CreateAccInventoryAction', [$request]);

        $this->uploadMedia( $accinventory, "image", true );
        $this->uploadMedia( $accinventory, "gallery" );
        $this->uploadMedia( $accinventory, "file" );

        return $this->created($this->transform($accinventory, AccInventoryTransformer::class));
    }

    /**
     * @param FindAccInventoryByIdRequest $request
     * @return array
     */
    public function findAccInventoryById(FindAccInventoryByIdRequest $request)
    {
        $accinventory = Apiato::call('AccInventory@FindAccInventoryByIdAction', [$request]);

        return $this->transform($accinventory, AccInventoryTransformer::class);
    }

    /**
     * @param GetAllAccInventoriesRequest $request
     * @return array
     */
    public function getAllAccInventories(GetAllAccInventoriesRequest $request)
    {
        $accinventories = Apiato::call('AccInventory@GetAllAccInventoriesAction', [$request]);

        return $this->transform($accinventories, AccInventoryTransformer::class);
    }

    /**
     * @param UpdateAccInventoryRequest $request
     * @return array
     */
    public function updateAccInventory(UpdateAccInventoryRequest $request)
    {
        $accinventory = Apiato::call('AccInventory@UpdateAccInventoryAction', [$request]);

        $this->uploadMedia( $accinventory, "image", true );
        $this->uploadMedia( $accinventory, "gallery" );
        $this->uploadMedia( $accinventory, "file" );

        return $this->transform($accinventory, AccInventoryTransformer::class);
    }

    /**
     * @param DeleteAccInventoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventory(DeleteAccInventoryRequest $request)
    {
        Apiato::call('AccInventory@DeleteAccInventoryAction', [$request]);

        return $this->noContent();
    }
}
