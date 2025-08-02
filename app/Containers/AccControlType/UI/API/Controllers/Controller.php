<?php

namespace App\Containers\AccControlType\UI\API\Controllers;

use App\Containers\AccControlType\UI\API\Requests\CreateAccControlTypeRequest;
use App\Containers\AccControlType\UI\API\Requests\DeleteAccControlTypeRequest;
use App\Containers\AccControlType\UI\API\Requests\GetAllAccControlTypesRequest;
use App\Containers\AccControlType\UI\API\Requests\FindAccControlTypeByIdRequest;
use App\Containers\AccControlType\UI\API\Requests\UpdateAccControlTypeRequest;
use App\Containers\AccControlType\UI\API\Transformers\AccControlTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccControlType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccControlTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccControlType(CreateAccControlTypeRequest $request)
    {
        $acccontroltype = Apiato::call('AccControlType@CreateAccControlTypeAction', [$request]);

        $this->uploadMedia( $acccontroltype, "image", true );
        $this->uploadMedia( $acccontroltype, "gallery" );
        $this->uploadMedia( $acccontroltype, "file" );

        return $this->created($this->transform($acccontroltype, AccControlTypeTransformer::class));
    }

    /**
     * @param FindAccControlTypeByIdRequest $request
     * @return array
     */
    public function findAccControlTypeById(FindAccControlTypeByIdRequest $request)
    {
        $acccontroltype = Apiato::call('AccControlType@FindAccControlTypeByIdAction', [$request]);

        return $this->transform($acccontroltype, AccControlTypeTransformer::class);
    }

    /**
     * @param GetAllAccControlTypesRequest $request
     * @return array
     */
    public function getAllAccControlTypes(GetAllAccControlTypesRequest $request)
    {
        $acccontroltypes = Apiato::call('AccControlType@GetAllAccControlTypesAction', [$request]);

        return $this->transform($acccontroltypes, AccControlTypeTransformer::class);
    }

    /**
     * @param UpdateAccControlTypeRequest $request
     * @return array
     */
    public function updateAccControlType(UpdateAccControlTypeRequest $request)
    {
        $acccontroltype = Apiato::call('AccControlType@UpdateAccControlTypeAction', [$request]);

        $this->uploadMedia( $acccontroltype, "image", true );
        $this->uploadMedia( $acccontroltype, "gallery" );
        $this->uploadMedia( $acccontroltype, "file" );

        return $this->transform($acccontroltype, AccControlTypeTransformer::class);
    }

    /**
     * @param DeleteAccControlTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccControlType(DeleteAccControlTypeRequest $request)
    {
        Apiato::call('AccControlType@DeleteAccControlTypeAction', [$request]);

        return $this->noContent();
    }
}
