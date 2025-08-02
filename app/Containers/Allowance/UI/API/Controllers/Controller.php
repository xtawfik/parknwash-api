<?php

namespace App\Containers\Allowance\UI\API\Controllers;

use App\Containers\Allowance\UI\API\Requests\CreateAllowanceRequest;
use App\Containers\Allowance\UI\API\Requests\DeleteAllowanceRequest;
use App\Containers\Allowance\UI\API\Requests\GetAllAllowancesRequest;
use App\Containers\Allowance\UI\API\Requests\FindAllowanceByIdRequest;
use App\Containers\Allowance\UI\API\Requests\UpdateAllowanceRequest;
use App\Containers\Allowance\UI\API\Transformers\AllowanceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Allowance\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAllowanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAllowance(CreateAllowanceRequest $request)
    {
        $allowance = Apiato::call('Allowance@CreateAllowanceAction', [$request]);

        $this->uploadMedia( $allowance, "image", true );
        $this->uploadMedia( $allowance, "gallery" );
        $this->uploadMedia( $allowance, "file" );

        return $this->created($this->transform($allowance, AllowanceTransformer::class));
    }

    /**
     * @param FindAllowanceByIdRequest $request
     * @return array
     */
    public function findAllowanceById(FindAllowanceByIdRequest $request)
    {
        $allowance = Apiato::call('Allowance@FindAllowanceByIdAction', [$request]);

        return $this->transform($allowance, AllowanceTransformer::class);
    }

    /**
     * @param GetAllAllowancesRequest $request
     * @return array
     */
    public function getAllAllowances(GetAllAllowancesRequest $request)
    {
        $allowances = Apiato::call('Allowance@GetAllAllowancesAction', [$request]);

        return $this->transform($allowances, AllowanceTransformer::class);
    }

    /**
     * @param UpdateAllowanceRequest $request
     * @return array
     */
    public function updateAllowance(UpdateAllowanceRequest $request)
    {
        $allowance = Apiato::call('Allowance@UpdateAllowanceAction', [$request]);

        $this->uploadMedia( $allowance, "image", true );
        $this->uploadMedia( $allowance, "gallery" );
        $this->uploadMedia( $allowance, "file" );

        return $this->transform($allowance, AllowanceTransformer::class);
    }

    /**
     * @param DeleteAllowanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAllowance(DeleteAllowanceRequest $request)
    {
        Apiato::call('Allowance@DeleteAllowanceAction', [$request]);

        return $this->noContent();
    }
}
