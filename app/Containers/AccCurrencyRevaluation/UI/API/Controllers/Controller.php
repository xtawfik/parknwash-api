<?php

namespace App\Containers\AccCurrencyRevaluation\UI\API\Controllers;

use App\Containers\AccCurrencyRevaluation\UI\API\Requests\CreateAccCurrencyRevaluationRequest;
use App\Containers\AccCurrencyRevaluation\UI\API\Requests\DeleteAccCurrencyRevaluationRequest;
use App\Containers\AccCurrencyRevaluation\UI\API\Requests\GetAllAccCurrencyRevaluationsRequest;
use App\Containers\AccCurrencyRevaluation\UI\API\Requests\FindAccCurrencyRevaluationByIdRequest;
use App\Containers\AccCurrencyRevaluation\UI\API\Requests\UpdateAccCurrencyRevaluationRequest;
use App\Containers\AccCurrencyRevaluation\UI\API\Transformers\AccCurrencyRevaluationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrencyRevaluation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyRevaluationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrencyRevaluation(CreateAccCurrencyRevaluationRequest $request)
    {
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@CreateAccCurrencyRevaluationAction', [$request]);

        $this->uploadMedia( $acccurrencyrevaluation, "image", true );
        $this->uploadMedia( $acccurrencyrevaluation, "gallery" );
        $this->uploadMedia( $acccurrencyrevaluation, "file" );

        return $this->created($this->transform($acccurrencyrevaluation, AccCurrencyRevaluationTransformer::class));
    }

    /**
     * @param FindAccCurrencyRevaluationByIdRequest $request
     * @return array
     */
    public function findAccCurrencyRevaluationById(FindAccCurrencyRevaluationByIdRequest $request)
    {
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@FindAccCurrencyRevaluationByIdAction', [$request]);

        return $this->transform($acccurrencyrevaluation, AccCurrencyRevaluationTransformer::class);
    }

    /**
     * @param GetAllAccCurrencyRevaluationsRequest $request
     * @return array
     */
    public function getAllAccCurrencyRevaluations(GetAllAccCurrencyRevaluationsRequest $request)
    {
        $acccurrencyrevaluations = Apiato::call('AccCurrencyRevaluation@GetAllAccCurrencyRevaluationsAction', [$request]);

        return $this->transform($acccurrencyrevaluations, AccCurrencyRevaluationTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyRevaluationRequest $request
     * @return array
     */
    public function updateAccCurrencyRevaluation(UpdateAccCurrencyRevaluationRequest $request)
    {
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@UpdateAccCurrencyRevaluationAction', [$request]);

        $this->uploadMedia( $acccurrencyrevaluation, "image", true );
        $this->uploadMedia( $acccurrencyrevaluation, "gallery" );
        $this->uploadMedia( $acccurrencyrevaluation, "file" );

        return $this->transform($acccurrencyrevaluation, AccCurrencyRevaluationTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyRevaluationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrencyRevaluation(DeleteAccCurrencyRevaluationRequest $request)
    {
        Apiato::call('AccCurrencyRevaluation@DeleteAccCurrencyRevaluationAction', [$request]);

        return $this->noContent();
    }
}
