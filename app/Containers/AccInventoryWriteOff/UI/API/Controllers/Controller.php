<?php

namespace App\Containers\AccInventoryWriteOff\UI\API\Controllers;

use App\Containers\AccInventoryWriteOff\UI\API\Requests\CreateAccInventoryWriteOffRequest;
use App\Containers\AccInventoryWriteOff\UI\API\Requests\DeleteAccInventoryWriteOffRequest;
use App\Containers\AccInventoryWriteOff\UI\API\Requests\GetAllAccInventoryWriteOffsRequest;
use App\Containers\AccInventoryWriteOff\UI\API\Requests\FindAccInventoryWriteOffByIdRequest;
use App\Containers\AccInventoryWriteOff\UI\API\Requests\UpdateAccInventoryWriteOffRequest;
use App\Containers\AccInventoryWriteOff\UI\API\Transformers\AccInventoryWriteOffTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInventoryWriteOff\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInventoryWriteOffRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInventoryWriteOff(CreateAccInventoryWriteOffRequest $request)
    {
        $accinventorywriteoff = Apiato::call('AccInventoryWriteOff@CreateAccInventoryWriteOffAction', [$request]);

        $this->uploadMedia( $accinventorywriteoff, "image", true );
        $this->uploadMedia( $accinventorywriteoff, "gallery" );
        $this->uploadMedia( $accinventorywriteoff, "file" );

        return $this->created($this->transform($accinventorywriteoff, AccInventoryWriteOffTransformer::class));
    }

    /**
     * @param FindAccInventoryWriteOffByIdRequest $request
     * @return array
     */
    public function findAccInventoryWriteOffById(FindAccInventoryWriteOffByIdRequest $request)
    {
        $accinventorywriteoff = Apiato::call('AccInventoryWriteOff@FindAccInventoryWriteOffByIdAction', [$request]);

        return $this->transform($accinventorywriteoff, AccInventoryWriteOffTransformer::class);
    }

    /**
     * @param GetAllAccInventoryWriteOffsRequest $request
     * @return array
     */
    public function getAllAccInventoryWriteOffs(GetAllAccInventoryWriteOffsRequest $request)
    {
        $accinventorywriteoffs = Apiato::call('AccInventoryWriteOff@GetAllAccInventoryWriteOffsAction', [$request]);

        return $this->transform($accinventorywriteoffs, AccInventoryWriteOffTransformer::class);
    }

    /**
     * @param UpdateAccInventoryWriteOffRequest $request
     * @return array
     */
    public function updateAccInventoryWriteOff(UpdateAccInventoryWriteOffRequest $request)
    {
        $accinventorywriteoff = Apiato::call('AccInventoryWriteOff@UpdateAccInventoryWriteOffAction', [$request]);

        $this->uploadMedia( $accinventorywriteoff, "image", true );
        $this->uploadMedia( $accinventorywriteoff, "gallery" );
        $this->uploadMedia( $accinventorywriteoff, "file" );

        return $this->transform($accinventorywriteoff, AccInventoryWriteOffTransformer::class);
    }

    /**
     * @param DeleteAccInventoryWriteOffRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInventoryWriteOff(DeleteAccInventoryWriteOffRequest $request)
    {
        Apiato::call('AccInventoryWriteOff@DeleteAccInventoryWriteOffAction', [$request]);

        return $this->noContent();
    }
}
