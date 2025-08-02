<?php

namespace App\Containers\AccReconciliation\UI\API\Controllers;

use App\Containers\AccReconciliation\UI\API\Requests\CreateAccReconciliationRequest;
use App\Containers\AccReconciliation\UI\API\Requests\DeleteAccReconciliationRequest;
use App\Containers\AccReconciliation\UI\API\Requests\GetAllAccReconciliationsRequest;
use App\Containers\AccReconciliation\UI\API\Requests\FindAccReconciliationByIdRequest;
use App\Containers\AccReconciliation\UI\API\Requests\UpdateAccReconciliationRequest;
use App\Containers\AccReconciliation\UI\API\Transformers\AccReconciliationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccReconciliation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccReconciliationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccReconciliation(CreateAccReconciliationRequest $request)
    {
        $accreconciliation = Apiato::call('AccReconciliation@CreateAccReconciliationAction', [$request]);

        $this->uploadMedia( $accreconciliation, "image", true );
        $this->uploadMedia( $accreconciliation, "gallery" );
        $this->uploadMedia( $accreconciliation, "file" );

        return $this->created($this->transform($accreconciliation, AccReconciliationTransformer::class));
    }

    /**
     * @param FindAccReconciliationByIdRequest $request
     * @return array
     */
    public function findAccReconciliationById(FindAccReconciliationByIdRequest $request)
    {
        $accreconciliation = Apiato::call('AccReconciliation@FindAccReconciliationByIdAction', [$request]);

        return $this->transform($accreconciliation, AccReconciliationTransformer::class);
    }

    /**
     * @param GetAllAccReconciliationsRequest $request
     * @return array
     */
    public function getAllAccReconciliations(GetAllAccReconciliationsRequest $request)
    {
        $accreconciliations = Apiato::call('AccReconciliation@GetAllAccReconciliationsAction', [$request]);

        return $this->transform($accreconciliations, AccReconciliationTransformer::class);
    }

    /**
     * @param UpdateAccReconciliationRequest $request
     * @return array
     */
    public function updateAccReconciliation(UpdateAccReconciliationRequest $request)
    {
        $accreconciliation = Apiato::call('AccReconciliation@UpdateAccReconciliationAction', [$request]);

        $this->uploadMedia( $accreconciliation, "image", true );
        $this->uploadMedia( $accreconciliation, "gallery" );
        $this->uploadMedia( $accreconciliation, "file" );

        return $this->transform($accreconciliation, AccReconciliationTransformer::class);
    }

    /**
     * @param DeleteAccReconciliationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccReconciliation(DeleteAccReconciliationRequest $request)
    {
        Apiato::call('AccReconciliation@DeleteAccReconciliationAction', [$request]);

        return $this->noContent();
    }
}
