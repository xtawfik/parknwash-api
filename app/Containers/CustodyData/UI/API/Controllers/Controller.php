<?php

namespace App\Containers\CustodyData\UI\API\Controllers;

use App\Containers\CustodyData\UI\API\Requests\CreateCustodyDataRequest;
use App\Containers\CustodyData\UI\API\Requests\DeleteCustodyDataRequest;
use App\Containers\CustodyData\UI\API\Requests\GetAllCustodyDatasRequest;
use App\Containers\CustodyData\UI\API\Requests\FindCustodyDataByIdRequest;
use App\Containers\CustodyData\UI\API\Requests\UpdateCustodyDataRequest;
use App\Containers\CustodyData\UI\API\Transformers\CustodyDataTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CustodyData\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCustodyDataRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustodyData(CreateCustodyDataRequest $request)
    {
        $custodydata = Apiato::call('CustodyData@CreateCustodyDataAction', [$request]);

        $this->uploadMedia( $custodydata, "image", true );
        $this->uploadMedia( $custodydata, "gallery" );
        $this->uploadMedia( $custodydata, "file" );

        return $this->created($this->transform($custodydata, CustodyDataTransformer::class));
    }

    /**
     * @param FindCustodyDataByIdRequest $request
     * @return array
     */
    public function findCustodyDataById(FindCustodyDataByIdRequest $request)
    {
        $custodydata = Apiato::call('CustodyData@FindCustodyDataByIdAction', [$request]);

        return $this->transform($custodydata, CustodyDataTransformer::class);
    }

    /**
     * @param GetAllCustodyDatasRequest $request
     * @return array
     */
    public function getAllCustodyDatas(GetAllCustodyDatasRequest $request)
    {
        $custodydatas = Apiato::call('CustodyData@GetAllCustodyDatasAction', [$request]);

        return $this->transform($custodydatas, CustodyDataTransformer::class);
    }

    /**
     * @param UpdateCustodyDataRequest $request
     * @return array
     */
    public function updateCustodyData(UpdateCustodyDataRequest $request)
    {
        $custodydata = Apiato::call('CustodyData@UpdateCustodyDataAction', [$request]);

        $this->uploadMedia( $custodydata, "image", true );
        $this->uploadMedia( $custodydata, "gallery" );
        $this->uploadMedia( $custodydata, "file" );

        return $this->transform($custodydata, CustodyDataTransformer::class);
    }

    /**
     * @param DeleteCustodyDataRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCustodyData(DeleteCustodyDataRequest $request)
    {
        Apiato::call('CustodyData@DeleteCustodyDataAction', [$request]);

        return $this->noContent();
    }
}
