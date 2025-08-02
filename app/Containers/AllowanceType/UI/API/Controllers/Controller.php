<?php

namespace App\Containers\AllowanceType\UI\API\Controllers;

use App\Containers\AllowanceType\UI\API\Requests\CreateAllowanceTypeRequest;
use App\Containers\AllowanceType\UI\API\Requests\DeleteAllowanceTypeRequest;
use App\Containers\AllowanceType\UI\API\Requests\GetAllAllowanceTypesRequest;
use App\Containers\AllowanceType\UI\API\Requests\FindAllowanceTypeByIdRequest;
use App\Containers\AllowanceType\UI\API\Requests\UpdateAllowanceTypeRequest;
use App\Containers\AllowanceType\UI\API\Transformers\AllowanceTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AllowanceType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAllowanceTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAllowanceType(CreateAllowanceTypeRequest $request)
    {
        $allowancetype = Apiato::call('AllowanceType@CreateAllowanceTypeAction', [$request]);

        $this->uploadMedia( $allowancetype, "image", true );
        $this->uploadMedia( $allowancetype, "gallery" );
        $this->uploadMedia( $allowancetype, "file" );

        return $this->created($this->transform($allowancetype, AllowanceTypeTransformer::class));
    }

    /**
     * @param FindAllowanceTypeByIdRequest $request
     * @return array
     */
    public function findAllowanceTypeById(FindAllowanceTypeByIdRequest $request)
    {
        $allowancetype = Apiato::call('AllowanceType@FindAllowanceTypeByIdAction', [$request]);

        return $this->transform($allowancetype, AllowanceTypeTransformer::class);
    }

    /**
     * @param GetAllAllowanceTypesRequest $request
     * @return array
     */
    public function getAllAllowanceTypes(GetAllAllowanceTypesRequest $request)
    {
        $allowancetypes = Apiato::call('AllowanceType@GetAllAllowanceTypesAction', [$request]);

        return $this->transform($allowancetypes, AllowanceTypeTransformer::class);
    }

    /**
     * @param UpdateAllowanceTypeRequest $request
     * @return array
     */
    public function updateAllowanceType(UpdateAllowanceTypeRequest $request)
    {
        $allowancetype = Apiato::call('AllowanceType@UpdateAllowanceTypeAction', [$request]);

        $this->uploadMedia( $allowancetype, "image", true );
        $this->uploadMedia( $allowancetype, "gallery" );
        $this->uploadMedia( $allowancetype, "file" );

        return $this->transform($allowancetype, AllowanceTypeTransformer::class);
    }

    /**
     * @param DeleteAllowanceTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAllowanceType(DeleteAllowanceTypeRequest $request)
    {
        Apiato::call('AllowanceType@DeleteAllowanceTypeAction', [$request]);

        return $this->noContent();
    }
}
