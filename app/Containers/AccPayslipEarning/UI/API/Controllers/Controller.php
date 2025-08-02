<?php

namespace App\Containers\AccPayslipEarning\UI\API\Controllers;

use App\Containers\AccPayslipEarning\UI\API\Requests\CreateAccPayslipEarningRequest;
use App\Containers\AccPayslipEarning\UI\API\Requests\DeleteAccPayslipEarningRequest;
use App\Containers\AccPayslipEarning\UI\API\Requests\GetAllAccPayslipEarningsRequest;
use App\Containers\AccPayslipEarning\UI\API\Requests\FindAccPayslipEarningByIdRequest;
use App\Containers\AccPayslipEarning\UI\API\Requests\UpdateAccPayslipEarningRequest;
use App\Containers\AccPayslipEarning\UI\API\Transformers\AccPayslipEarningTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslipEarning\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipEarningRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslipEarning(CreateAccPayslipEarningRequest $request)
    {
        $accpayslipearning = Apiato::call('AccPayslipEarning@CreateAccPayslipEarningAction', [$request]);

        $this->uploadMedia( $accpayslipearning, "image", true );
        $this->uploadMedia( $accpayslipearning, "gallery" );
        $this->uploadMedia( $accpayslipearning, "file" );

        return $this->created($this->transform($accpayslipearning, AccPayslipEarningTransformer::class));
    }

    /**
     * @param FindAccPayslipEarningByIdRequest $request
     * @return array
     */
    public function findAccPayslipEarningById(FindAccPayslipEarningByIdRequest $request)
    {
        $accpayslipearning = Apiato::call('AccPayslipEarning@FindAccPayslipEarningByIdAction', [$request]);

        return $this->transform($accpayslipearning, AccPayslipEarningTransformer::class);
    }

    /**
     * @param GetAllAccPayslipEarningsRequest $request
     * @return array
     */
    public function getAllAccPayslipEarnings(GetAllAccPayslipEarningsRequest $request)
    {
        $accpayslipearnings = Apiato::call('AccPayslipEarning@GetAllAccPayslipEarningsAction', [$request]);

        return $this->transform($accpayslipearnings, AccPayslipEarningTransformer::class);
    }

    /**
     * @param UpdateAccPayslipEarningRequest $request
     * @return array
     */
    public function updateAccPayslipEarning(UpdateAccPayslipEarningRequest $request)
    {
        $accpayslipearning = Apiato::call('AccPayslipEarning@UpdateAccPayslipEarningAction', [$request]);

        $this->uploadMedia( $accpayslipearning, "image", true );
        $this->uploadMedia( $accpayslipearning, "gallery" );
        $this->uploadMedia( $accpayslipearning, "file" );

        return $this->transform($accpayslipearning, AccPayslipEarningTransformer::class);
    }

    /**
     * @param DeleteAccPayslipEarningRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslipEarning(DeleteAccPayslipEarningRequest $request)
    {
        Apiato::call('AccPayslipEarning@DeleteAccPayslipEarningAction', [$request]);

        return $this->noContent();
    }
}
