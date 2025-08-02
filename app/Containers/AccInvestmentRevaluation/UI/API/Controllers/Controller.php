<?php

namespace App\Containers\AccInvestmentRevaluation\UI\API\Controllers;

use App\Containers\AccInvestmentRevaluation\UI\API\Requests\CreateAccInvestmentRevaluationRequest;
use App\Containers\AccInvestmentRevaluation\UI\API\Requests\DeleteAccInvestmentRevaluationRequest;
use App\Containers\AccInvestmentRevaluation\UI\API\Requests\GetAllAccInvestmentRevaluationsRequest;
use App\Containers\AccInvestmentRevaluation\UI\API\Requests\FindAccInvestmentRevaluationByIdRequest;
use App\Containers\AccInvestmentRevaluation\UI\API\Requests\UpdateAccInvestmentRevaluationRequest;
use App\Containers\AccInvestmentRevaluation\UI\API\Transformers\AccInvestmentRevaluationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccInvestmentRevaluation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccInvestmentRevaluationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccInvestmentRevaluation(CreateAccInvestmentRevaluationRequest $request)
    {
        $accinvestmentrevaluation = Apiato::call('AccInvestmentRevaluation@CreateAccInvestmentRevaluationAction', [$request]);

        $this->uploadMedia( $accinvestmentrevaluation, "image", true );
        $this->uploadMedia( $accinvestmentrevaluation, "gallery" );
        $this->uploadMedia( $accinvestmentrevaluation, "file" );

        return $this->created($this->transform($accinvestmentrevaluation, AccInvestmentRevaluationTransformer::class));
    }

    /**
     * @param FindAccInvestmentRevaluationByIdRequest $request
     * @return array
     */
    public function findAccInvestmentRevaluationById(FindAccInvestmentRevaluationByIdRequest $request)
    {
        $accinvestmentrevaluation = Apiato::call('AccInvestmentRevaluation@FindAccInvestmentRevaluationByIdAction', [$request]);

        return $this->transform($accinvestmentrevaluation, AccInvestmentRevaluationTransformer::class);
    }

    /**
     * @param GetAllAccInvestmentRevaluationsRequest $request
     * @return array
     */
    public function getAllAccInvestmentRevaluations(GetAllAccInvestmentRevaluationsRequest $request)
    {
        $accinvestmentrevaluations = Apiato::call('AccInvestmentRevaluation@GetAllAccInvestmentRevaluationsAction', [$request]);

        return $this->transform($accinvestmentrevaluations, AccInvestmentRevaluationTransformer::class);
    }

    /**
     * @param UpdateAccInvestmentRevaluationRequest $request
     * @return array
     */
    public function updateAccInvestmentRevaluation(UpdateAccInvestmentRevaluationRequest $request)
    {
        $accinvestmentrevaluation = Apiato::call('AccInvestmentRevaluation@UpdateAccInvestmentRevaluationAction', [$request]);

        $this->uploadMedia( $accinvestmentrevaluation, "image", true );
        $this->uploadMedia( $accinvestmentrevaluation, "gallery" );
        $this->uploadMedia( $accinvestmentrevaluation, "file" );

        return $this->transform($accinvestmentrevaluation, AccInvestmentRevaluationTransformer::class);
    }

    /**
     * @param DeleteAccInvestmentRevaluationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccInvestmentRevaluation(DeleteAccInvestmentRevaluationRequest $request)
    {
        Apiato::call('AccInvestmentRevaluation@DeleteAccInvestmentRevaluationAction', [$request]);

        return $this->noContent();
    }
}
