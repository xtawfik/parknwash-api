<?php

namespace App\Containers\AccExpenseClaimPayers\UI\API\Controllers;

use App\Containers\AccExpenseClaimPayers\UI\API\Requests\CreateAccExpenseClaimPayersRequest;
use App\Containers\AccExpenseClaimPayers\UI\API\Requests\DeleteAccExpenseClaimPayersRequest;
use App\Containers\AccExpenseClaimPayers\UI\API\Requests\GetAllAccExpenseClaimPayersRequest;
use App\Containers\AccExpenseClaimPayers\UI\API\Requests\FindAccExpenseClaimPayersByIdRequest;
use App\Containers\AccExpenseClaimPayers\UI\API\Requests\UpdateAccExpenseClaimPayersRequest;
use App\Containers\AccExpenseClaimPayers\UI\API\Transformers\AccExpenseClaimPayersTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccExpenseClaimPayers\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccExpenseClaimPayersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccExpenseClaimPayers(CreateAccExpenseClaimPayersRequest $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@CreateAccExpenseClaimPayersAction', [$request]);

        $this->uploadMedia( $accexpenseclaimpayers, "image", true );
        $this->uploadMedia( $accexpenseclaimpayers, "gallery" );
        $this->uploadMedia( $accexpenseclaimpayers, "file" );

        return $this->created($this->transform($accexpenseclaimpayers, AccExpenseClaimPayersTransformer::class));
    }

    /**
     * @param FindAccExpenseClaimPayersByIdRequest $request
     * @return array
     */
    public function findAccExpenseClaimPayersById(FindAccExpenseClaimPayersByIdRequest $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@FindAccExpenseClaimPayersByIdAction', [$request]);

        return $this->transform($accexpenseclaimpayers, AccExpenseClaimPayersTransformer::class);
    }

    /**
     * @param GetAllAccExpenseClaimPayersRequest $request
     * @return array
     */
    public function getAllAccExpenseClaimPayers(GetAllAccExpenseClaimPayersRequest $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@GetAllAccExpenseClaimPayersAction', [$request]);

        return $this->transform($accexpenseclaimpayers, AccExpenseClaimPayersTransformer::class);
    }

    /**
     * @param UpdateAccExpenseClaimPayersRequest $request
     * @return array
     */
    public function updateAccExpenseClaimPayers(UpdateAccExpenseClaimPayersRequest $request)
    {
        $accexpenseclaimpayers = Apiato::call('AccExpenseClaimPayers@UpdateAccExpenseClaimPayersAction', [$request]);

        $this->uploadMedia( $accexpenseclaimpayers, "image", true );
        $this->uploadMedia( $accexpenseclaimpayers, "gallery" );
        $this->uploadMedia( $accexpenseclaimpayers, "file" );

        return $this->transform($accexpenseclaimpayers, AccExpenseClaimPayersTransformer::class);
    }

    /**
     * @param DeleteAccExpenseClaimPayersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccExpenseClaimPayers(DeleteAccExpenseClaimPayersRequest $request)
    {
        Apiato::call('AccExpenseClaimPayers@DeleteAccExpenseClaimPayersAction', [$request]);

        return $this->noContent();
    }
}
