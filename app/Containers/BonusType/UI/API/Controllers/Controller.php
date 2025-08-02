<?php

namespace App\Containers\BonusType\UI\API\Controllers;

use App\Containers\BonusType\UI\API\Requests\CreateBonusTypeRequest;
use App\Containers\BonusType\UI\API\Requests\DeleteBonusTypeRequest;
use App\Containers\BonusType\UI\API\Requests\GetAllBonusTypesRequest;
use App\Containers\BonusType\UI\API\Requests\FindBonusTypeByIdRequest;
use App\Containers\BonusType\UI\API\Requests\UpdateBonusTypeRequest;
use App\Containers\BonusType\UI\API\Transformers\BonusTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\BonusType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBonusTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBonusType(CreateBonusTypeRequest $request)
    {
        $bonustype = Apiato::call('BonusType@CreateBonusTypeAction', [$request]);

        $this->uploadMedia( $bonustype, "image", true );
        $this->uploadMedia( $bonustype, "gallery" );
        $this->uploadMedia( $bonustype, "file" );

        return $this->created($this->transform($bonustype, BonusTypeTransformer::class));
    }

    /**
     * @param FindBonusTypeByIdRequest $request
     * @return array
     */
    public function findBonusTypeById(FindBonusTypeByIdRequest $request)
    {
        $bonustype = Apiato::call('BonusType@FindBonusTypeByIdAction', [$request]);

        return $this->transform($bonustype, BonusTypeTransformer::class);
    }

    /**
     * @param GetAllBonusTypesRequest $request
     * @return array
     */
    public function getAllBonusTypes(GetAllBonusTypesRequest $request)
    {
        $bonustypes = Apiato::call('BonusType@GetAllBonusTypesAction', [$request]);

        return $this->transform($bonustypes, BonusTypeTransformer::class);
    }

    /**
     * @param UpdateBonusTypeRequest $request
     * @return array
     */
    public function updateBonusType(UpdateBonusTypeRequest $request)
    {
        $bonustype = Apiato::call('BonusType@UpdateBonusTypeAction', [$request]);

        $this->uploadMedia( $bonustype, "image", true );
        $this->uploadMedia( $bonustype, "gallery" );
        $this->uploadMedia( $bonustype, "file" );

        return $this->transform($bonustype, BonusTypeTransformer::class);
    }

    /**
     * @param DeleteBonusTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBonusType(DeleteBonusTypeRequest $request)
    {
        Apiato::call('BonusType@DeleteBonusTypeAction', [$request]);

        return $this->noContent();
    }
}
