<?php

namespace App\Containers\AccPayslip\UI\API\Controllers;

use App\Containers\AccPayslip\UI\API\Requests\CreateAccPayslipRequest;
use App\Containers\AccPayslip\UI\API\Requests\DeleteAccPayslipRequest;
use App\Containers\AccPayslip\UI\API\Requests\GetAllAccPayslipsRequest;
use App\Containers\AccPayslip\UI\API\Requests\FindAccPayslipByIdRequest;
use App\Containers\AccPayslip\UI\API\Requests\UpdateAccPayslipRequest;
use App\Containers\AccPayslip\UI\API\Transformers\AccPayslipTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccPayslip\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccPayslipRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccPayslip(CreateAccPayslipRequest $request)
    {
        $accpayslip = Apiato::call('AccPayslip@CreateAccPayslipAction', [$request]);

        $this->uploadMedia( $accpayslip, "image", true );
        $this->uploadMedia( $accpayslip, "gallery" );
        $this->uploadMedia( $accpayslip, "file" );

        return $this->created($this->transform($accpayslip, AccPayslipTransformer::class));
    }

    /**
     * @param FindAccPayslipByIdRequest $request
     * @return array
     */
    public function findAccPayslipById(FindAccPayslipByIdRequest $request)
    {
        $accpayslip = Apiato::call('AccPayslip@FindAccPayslipByIdAction', [$request]);

        return $this->transform($accpayslip, AccPayslipTransformer::class);
    }

    /**
     * @param GetAllAccPayslipsRequest $request
     * @return array
     */
    public function getAllAccPayslips(GetAllAccPayslipsRequest $request)
    {
        $accpayslips = Apiato::call('AccPayslip@GetAllAccPayslipsAction', [$request]);

        return $this->transform($accpayslips, AccPayslipTransformer::class);
    }

    /**
     * @param UpdateAccPayslipRequest $request
     * @return array
     */
    public function updateAccPayslip(UpdateAccPayslipRequest $request)
    {
        $accpayslip = Apiato::call('AccPayslip@UpdateAccPayslipAction', [$request]);

        $this->uploadMedia( $accpayslip, "image", true );
        $this->uploadMedia( $accpayslip, "gallery" );
        $this->uploadMedia( $accpayslip, "file" );

        return $this->transform($accpayslip, AccPayslipTransformer::class);
    }

    /**
     * @param DeleteAccPayslipRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccPayslip(DeleteAccPayslipRequest $request)
    {
        Apiato::call('AccPayslip@DeleteAccPayslipAction', [$request]);

        return $this->noContent();
    }
}
