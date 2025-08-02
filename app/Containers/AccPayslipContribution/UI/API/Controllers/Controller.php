<?php

namespace App\Containers\AccPayslipContribution\UI\API\Controllers;

use App\Containers\AccPayslipContribution\UI\API\Requests\CreateAccPayslipContributionRequest;
use App\Containers\AccPayslipContribution\UI\API\Requests\DeleteAccPayslipContributionRequest;
use App\Containers\AccPayslipContribution\UI\API\Requests\GetAllAccPayslipContributionsRequest;
use App\Containers\AccPayslipContribution\UI\API\Requests\FindAccPayslipContributionByIdRequest;
use App\Containers\AccPayslipContribution\UI\API\Requests\UpdateAccPayslipContributionRequest;
use App\Containers\AccPayslipContribution\UI\API\Transformers\AccPayslipContributionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslipContribution\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipContributionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslipContribution(CreateAccPayslipContributionRequest $request)
    {
        $accpayslipcontribution = Apiato::call('AccPayslipContribution@CreateAccPayslipContributionAction', [$request]);

        $this->uploadMedia( $accpayslipcontribution, "image", true );
        $this->uploadMedia( $accpayslipcontribution, "gallery" );
        $this->uploadMedia( $accpayslipcontribution, "file" );

        return $this->created($this->transform($accpayslipcontribution, AccPayslipContributionTransformer::class));
    }

    /**
     * @param FindAccPayslipContributionByIdRequest $request
     * @return array
     */
    public function findAccPayslipContributionById(FindAccPayslipContributionByIdRequest $request)
    {
        $accpayslipcontribution = Apiato::call('AccPayslipContribution@FindAccPayslipContributionByIdAction', [$request]);

        return $this->transform($accpayslipcontribution, AccPayslipContributionTransformer::class);
    }

    /**
     * @param GetAllAccPayslipContributionsRequest $request
     * @return array
     */
    public function getAllAccPayslipContributions(GetAllAccPayslipContributionsRequest $request)
    {
        $accpayslipcontributions = Apiato::call('AccPayslipContribution@GetAllAccPayslipContributionsAction', [$request]);

        return $this->transform($accpayslipcontributions, AccPayslipContributionTransformer::class);
    }

    /**
     * @param UpdateAccPayslipContributionRequest $request
     * @return array
     */
    public function updateAccPayslipContribution(UpdateAccPayslipContributionRequest $request)
    {
        $accpayslipcontribution = Apiato::call('AccPayslipContribution@UpdateAccPayslipContributionAction', [$request]);

        $this->uploadMedia( $accpayslipcontribution, "image", true );
        $this->uploadMedia( $accpayslipcontribution, "gallery" );
        $this->uploadMedia( $accpayslipcontribution, "file" );

        return $this->transform($accpayslipcontribution, AccPayslipContributionTransformer::class);
    }

    /**
     * @param DeleteAccPayslipContributionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslipContribution(DeleteAccPayslipContributionRequest $request)
    {
        Apiato::call('AccPayslipContribution@DeleteAccPayslipContributionAction', [$request]);

        return $this->noContent();
    }
}
