<?php

namespace App\Containers\Bonus\UI\API\Controllers;

use App\Containers\Bonus\UI\API\Requests\CreateBonusRequest;
use App\Containers\Bonus\UI\API\Requests\DeleteBonusRequest;
use App\Containers\Bonus\UI\API\Requests\GetAllBonusesRequest;
use App\Containers\Bonus\UI\API\Requests\FindBonusByIdRequest;
use App\Containers\Bonus\UI\API\Requests\UpdateBonusRequest;
use App\Containers\Bonus\UI\API\Transformers\BonusTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Bonus\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBonusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBonus(CreateBonusRequest $request)
    {
        $bonus = Apiato::call('Bonus@CreateBonusAction', [$request]);

        $this->uploadMedia( $bonus, "image", true );
        $this->uploadMedia( $bonus, "gallery" );
        $this->uploadMedia( $bonus, "file" );

        return $this->created($this->transform($bonus, BonusTransformer::class));
    }

    /**
     * @param FindBonusByIdRequest $request
     * @return array
     */
    public function findBonusById(FindBonusByIdRequest $request)
    {
        $bonus = Apiato::call('Bonus@FindBonusByIdAction', [$request]);

        return $this->transform($bonus, BonusTransformer::class);
    }

    /**
     * @param GetAllBonusesRequest $request
     * @return array
     */
    public function getAllBonuses(GetAllBonusesRequest $request)
    {
        $bonuses = Apiato::call('Bonus@GetAllBonusesAction', [$request]);

        return $this->transform($bonuses, BonusTransformer::class);
    }

    /**
     * @param UpdateBonusRequest $request
     * @return array
     */
    public function updateBonus(UpdateBonusRequest $request)
    {
        $bonus = Apiato::call('Bonus@UpdateBonusAction', [$request]);

        $this->uploadMedia( $bonus, "image", true );
        $this->uploadMedia( $bonus, "gallery" );
        $this->uploadMedia( $bonus, "file" );

        return $this->transform($bonus, BonusTransformer::class);
    }

    /**
     * @param DeleteBonusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBonus(DeleteBonusRequest $request)
    {
        Apiato::call('Bonus@DeleteBonusAction', [$request]);

        return $this->noContent();
    }
}
