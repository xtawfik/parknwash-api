<?php

namespace App\Containers\Custody\UI\API\Controllers;

use App\Containers\Custody\UI\API\Requests\CreateCustodyRequest;
use App\Containers\Custody\UI\API\Requests\DeleteCustodyRequest;
use App\Containers\Custody\UI\API\Requests\GetAllCustodiesRequest;
use App\Containers\Custody\UI\API\Requests\FindCustodyByIdRequest;
use App\Containers\Custody\UI\API\Requests\UpdateCustodyRequest;
use App\Containers\Custody\UI\API\Transformers\CustodyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Custody\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCustodyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustody(CreateCustodyRequest $request)
    {
        $custody = Apiato::call('Custody@CreateCustodyAction', [$request]);

        $this->uploadMedia( $custody, "image", true );
        $this->uploadMedia( $custody, "gallery" );
        $this->uploadMedia( $custody, "file" );

        return $this->created($this->transform($custody, CustodyTransformer::class));
    }

    /**
     * @param FindCustodyByIdRequest $request
     * @return array
     */
    public function findCustodyById(FindCustodyByIdRequest $request)
    {
        $custody = Apiato::call('Custody@FindCustodyByIdAction', [$request]);

        return $this->transform($custody, CustodyTransformer::class);
    }

    /**
     * @param GetAllCustodiesRequest $request
     * @return array
     */
    public function getAllCustodies(GetAllCustodiesRequest $request)
    {
        $custodies = Apiato::call('Custody@GetAllCustodiesAction', [$request]);

        return $this->transform($custodies, CustodyTransformer::class);
    }

    /**
     * @param UpdateCustodyRequest $request
     * @return array
     */
    public function updateCustody(UpdateCustodyRequest $request)
    {
        $custody = Apiato::call('Custody@UpdateCustodyAction', [$request]);

        $this->uploadMedia( $custody, "image", true );
        $this->uploadMedia( $custody, "gallery" );
        $this->uploadMedia( $custody, "file" );

        return $this->transform($custody, CustodyTransformer::class);
    }

    /**
     * @param DeleteCustodyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCustody(DeleteCustodyRequest $request)
    {
        Apiato::call('Custody@DeleteCustodyAction', [$request]);

        return $this->noContent();
    }
}
