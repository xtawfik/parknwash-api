<?php

namespace App\Containers\AccInvestment\UI\API\Controllers;

use App\Containers\AccInvestment\UI\API\Requests\CreateAccInvestmentRequest;
use App\Containers\AccInvestment\UI\API\Requests\DeleteAccInvestmentRequest;
use App\Containers\AccInvestment\UI\API\Requests\GetAllAccInvestmentsRequest;
use App\Containers\AccInvestment\UI\API\Requests\FindAccInvestmentByIdRequest;
use App\Containers\AccInvestment\UI\API\Requests\UpdateAccInvestmentRequest;
use App\Containers\AccInvestment\UI\API\Transformers\AccInvestmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInvestment\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInvestmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInvestment(CreateAccInvestmentRequest $request)
    {
        $accinvestment = Apiato::call('AccInvestment@CreateAccInvestmentAction', [$request]);

        $this->uploadMedia( $accinvestment, "image", true );
        $this->uploadMedia( $accinvestment, "gallery" );
        $this->uploadMedia( $accinvestment, "file" );

        return $this->created($this->transform($accinvestment, AccInvestmentTransformer::class));
    }

    /**
     * @param FindAccInvestmentByIdRequest $request
     * @return array
     */
    public function findAccInvestmentById(FindAccInvestmentByIdRequest $request)
    {
        $accinvestment = Apiato::call('AccInvestment@FindAccInvestmentByIdAction', [$request]);

        return $this->transform($accinvestment, AccInvestmentTransformer::class);
    }

    /**
     * @param GetAllAccInvestmentsRequest $request
     * @return array
     */
    public function getAllAccInvestments(GetAllAccInvestmentsRequest $request)
    {
        $accinvestments = Apiato::call('AccInvestment@GetAllAccInvestmentsAction', [$request]);

        return $this->transform($accinvestments, AccInvestmentTransformer::class);
    }

    /**
     * @param UpdateAccInvestmentRequest $request
     * @return array
     */
    public function updateAccInvestment(UpdateAccInvestmentRequest $request)
    {
        $accinvestment = Apiato::call('AccInvestment@UpdateAccInvestmentAction', [$request]);

        $this->uploadMedia( $accinvestment, "image", true );
        $this->uploadMedia( $accinvestment, "gallery" );
        $this->uploadMedia( $accinvestment, "file" );

        return $this->transform($accinvestment, AccInvestmentTransformer::class);
    }

    /**
     * @param DeleteAccInvestmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInvestment(DeleteAccInvestmentRequest $request)
    {
        Apiato::call('AccInvestment@DeleteAccInvestmentAction', [$request]);

        return $this->noContent();
    }
}
