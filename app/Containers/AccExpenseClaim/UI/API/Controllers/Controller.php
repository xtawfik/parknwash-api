<?php

namespace App\Containers\AccExpenseClaim\UI\API\Controllers;

use App\Containers\AccExpenseClaim\UI\API\Requests\CreateAccExpenseClaimRequest;
use App\Containers\AccExpenseClaim\UI\API\Requests\DeleteAccExpenseClaimRequest;
use App\Containers\AccExpenseClaim\UI\API\Requests\GetAllAccExpenseClaimsRequest;
use App\Containers\AccExpenseClaim\UI\API\Requests\FindAccExpenseClaimByIdRequest;
use App\Containers\AccExpenseClaim\UI\API\Requests\UpdateAccExpenseClaimRequest;
use App\Containers\AccExpenseClaim\UI\API\Transformers\AccExpenseClaimTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccExpenseClaim\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccExpenseClaimRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccExpenseClaim(CreateAccExpenseClaimRequest $request)
    {
        $accexpenseclaim = Apiato::call('AccExpenseClaim@CreateAccExpenseClaimAction', [$request]);

        $this->uploadMedia( $accexpenseclaim, "image", true );
        $this->uploadMedia( $accexpenseclaim, "gallery" );
        $this->uploadMedia( $accexpenseclaim, "file" );

        return $this->created($this->transform($accexpenseclaim, AccExpenseClaimTransformer::class));
    }

    /**
     * @param FindAccExpenseClaimByIdRequest $request
     * @return array
     */
    public function findAccExpenseClaimById(FindAccExpenseClaimByIdRequest $request)
    {
        $accexpenseclaim = Apiato::call('AccExpenseClaim@FindAccExpenseClaimByIdAction', [$request]);

        return $this->transform($accexpenseclaim, AccExpenseClaimTransformer::class);
    }

    /**
     * @param GetAllAccExpenseClaimsRequest $request
     * @return array
     */
    public function getAllAccExpenseClaims(GetAllAccExpenseClaimsRequest $request)
    {
        $accexpenseclaims = Apiato::call('AccExpenseClaim@GetAllAccExpenseClaimsAction', [$request]);

        return $this->transform($accexpenseclaims, AccExpenseClaimTransformer::class);
    }

    /**
     * @param UpdateAccExpenseClaimRequest $request
     * @return array
     */
    public function updateAccExpenseClaim(UpdateAccExpenseClaimRequest $request)
    {
        $accexpenseclaim = Apiato::call('AccExpenseClaim@UpdateAccExpenseClaimAction', [$request]);

        $this->uploadMedia( $accexpenseclaim, "image", true );
        $this->uploadMedia( $accexpenseclaim, "gallery" );
        $this->uploadMedia( $accexpenseclaim, "file" );

        return $this->transform($accexpenseclaim, AccExpenseClaimTransformer::class);
    }

    /**
     * @param DeleteAccExpenseClaimRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccExpenseClaim(DeleteAccExpenseClaimRequest $request)
    {
        Apiato::call('AccExpenseClaim@DeleteAccExpenseClaimAction', [$request]);

        return $this->noContent();
    }
}
