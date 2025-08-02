<?php

namespace App\Containers\AccReportingCategoryType\UI\API\Controllers;

use App\Containers\AccReportingCategoryType\UI\API\Requests\CreateAccReportingCategoryTypeRequest;
use App\Containers\AccReportingCategoryType\UI\API\Requests\DeleteAccReportingCategoryTypeRequest;
use App\Containers\AccReportingCategoryType\UI\API\Requests\GetAllAccReportingCategoryTypesRequest;
use App\Containers\AccReportingCategoryType\UI\API\Requests\FindAccReportingCategoryTypeByIdRequest;
use App\Containers\AccReportingCategoryType\UI\API\Requests\UpdateAccReportingCategoryTypeRequest;
use App\Containers\AccReportingCategoryType\UI\API\Transformers\AccReportingCategoryTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccReportingCategoryType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccReportingCategoryTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccReportingCategoryType(CreateAccReportingCategoryTypeRequest $request)
    {
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@CreateAccReportingCategoryTypeAction', [$request]);

        $this->uploadMedia( $accreportingcategorytype, "image", true );
        $this->uploadMedia( $accreportingcategorytype, "gallery" );
        $this->uploadMedia( $accreportingcategorytype, "file" );

        return $this->created($this->transform($accreportingcategorytype, AccReportingCategoryTypeTransformer::class));
    }

    /**
     * @param FindAccReportingCategoryTypeByIdRequest $request
     * @return array
     */
    public function findAccReportingCategoryTypeById(FindAccReportingCategoryTypeByIdRequest $request)
    {
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@FindAccReportingCategoryTypeByIdAction', [$request]);

        return $this->transform($accreportingcategorytype, AccReportingCategoryTypeTransformer::class);
    }

    /**
     * @param GetAllAccReportingCategoryTypesRequest $request
     * @return array
     */
    public function getAllAccReportingCategoryTypes(GetAllAccReportingCategoryTypesRequest $request)
    {
        $accreportingcategorytypes = Apiato::call('AccReportingCategoryType@GetAllAccReportingCategoryTypesAction', [$request]);

        return $this->transform($accreportingcategorytypes, AccReportingCategoryTypeTransformer::class);
    }

    /**
     * @param UpdateAccReportingCategoryTypeRequest $request
     * @return array
     */
    public function updateAccReportingCategoryType(UpdateAccReportingCategoryTypeRequest $request)
    {
        $accreportingcategorytype = Apiato::call('AccReportingCategoryType@UpdateAccReportingCategoryTypeAction', [$request]);

        $this->uploadMedia( $accreportingcategorytype, "image", true );
        $this->uploadMedia( $accreportingcategorytype, "gallery" );
        $this->uploadMedia( $accreportingcategorytype, "file" );

        return $this->transform($accreportingcategorytype, AccReportingCategoryTypeTransformer::class);
    }

    /**
     * @param DeleteAccReportingCategoryTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccReportingCategoryType(DeleteAccReportingCategoryTypeRequest $request)
    {
        Apiato::call('AccReportingCategoryType@DeleteAccReportingCategoryTypeAction', [$request]);

        return $this->noContent();
    }
}
