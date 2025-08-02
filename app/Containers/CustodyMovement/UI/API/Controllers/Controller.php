<?php

namespace App\Containers\CustodyMovement\UI\API\Controllers;

use App\Containers\CustodyMovement\UI\API\Requests\CreateCustodyMovementRequest;
use App\Containers\CustodyMovement\UI\API\Requests\DeleteCustodyMovementRequest;
use App\Containers\CustodyMovement\UI\API\Requests\GetAllCustodyMovementsRequest;
use App\Containers\CustodyMovement\UI\API\Requests\FindCustodyMovementByIdRequest;
use App\Containers\CustodyMovement\UI\API\Requests\UpdateCustodyMovementRequest;
use App\Containers\CustodyMovement\UI\API\Transformers\CustodyMovementTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CustodyMovement\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCustodyMovementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustodyMovement(CreateCustodyMovementRequest $request)
    {
        $custodymovement = Apiato::call('CustodyMovement@CreateCustodyMovementAction', [$request]);

        $this->uploadMedia( $custodymovement, "image", true );
        $this->uploadMedia( $custodymovement, "gallery" );
        $this->uploadMedia( $custodymovement, "file" );

        return $this->created($this->transform($custodymovement, CustodyMovementTransformer::class));
    }

    /**
     * @param FindCustodyMovementByIdRequest $request
     * @return array
     */
    public function findCustodyMovementById(FindCustodyMovementByIdRequest $request)
    {
        $custodymovement = Apiato::call('CustodyMovement@FindCustodyMovementByIdAction', [$request]);

        return $this->transform($custodymovement, CustodyMovementTransformer::class);
    }

    /**
     * @param GetAllCustodyMovementsRequest $request
     * @return array
     */
    public function getAllCustodyMovements(GetAllCustodyMovementsRequest $request)
    {
        $custodymovements = Apiato::call('CustodyMovement@GetAllCustodyMovementsAction', [$request]);

        return $this->transform($custodymovements, CustodyMovementTransformer::class);
    }

    /**
     * @param UpdateCustodyMovementRequest $request
     * @return array
     */
    public function updateCustodyMovement(UpdateCustodyMovementRequest $request)
    {
        $custodymovement = Apiato::call('CustodyMovement@UpdateCustodyMovementAction', [$request]);

        $this->uploadMedia( $custodymovement, "image", true );
        $this->uploadMedia( $custodymovement, "gallery" );
        $this->uploadMedia( $custodymovement, "file" );

        return $this->transform($custodymovement, CustodyMovementTransformer::class);
    }

    /**
     * @param DeleteCustodyMovementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCustodyMovement(DeleteCustodyMovementRequest $request)
    {
        Apiato::call('CustodyMovement@DeleteCustodyMovementAction', [$request]);

        return $this->noContent();
    }
}
