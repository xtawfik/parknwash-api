<?php

namespace App\Containers\LoanType\UI\API\Controllers;

use App\Containers\LoanType\UI\API\Requests\CreateLoanTypeRequest;
use App\Containers\LoanType\UI\API\Requests\DeleteLoanTypeRequest;
use App\Containers\LoanType\UI\API\Requests\GetAllLoanTypesRequest;
use App\Containers\LoanType\UI\API\Requests\FindLoanTypeByIdRequest;
use App\Containers\LoanType\UI\API\Requests\UpdateLoanTypeRequest;
use App\Containers\LoanType\UI\API\Transformers\LoanTypeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\LoanType\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateLoanTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLoanType(CreateLoanTypeRequest $request)
    {
        $loantype = Apiato::call('LoanType@CreateLoanTypeAction', [$request]);

        $this->uploadMedia( $loantype, "image", true );
        $this->uploadMedia( $loantype, "gallery" );
        $this->uploadMedia( $loantype, "file" );

        return $this->created($this->transform($loantype, LoanTypeTransformer::class));
    }

    /**
     * @param FindLoanTypeByIdRequest $request
     * @return array
     */
    public function findLoanTypeById(FindLoanTypeByIdRequest $request)
    {
        $loantype = Apiato::call('LoanType@FindLoanTypeByIdAction', [$request]);

        return $this->transform($loantype, LoanTypeTransformer::class);
    }

    /**
     * @param GetAllLoanTypesRequest $request
     * @return array
     */
    public function getAllLoanTypes(GetAllLoanTypesRequest $request)
    {
        $loantypes = Apiato::call('LoanType@GetAllLoanTypesAction', [$request]);

        return $this->transform($loantypes, LoanTypeTransformer::class);
    }

    /**
     * @param UpdateLoanTypeRequest $request
     * @return array
     */
    public function updateLoanType(UpdateLoanTypeRequest $request)
    {
        $loantype = Apiato::call('LoanType@UpdateLoanTypeAction', [$request]);

        $this->uploadMedia( $loantype, "image", true );
        $this->uploadMedia( $loantype, "gallery" );
        $this->uploadMedia( $loantype, "file" );

        return $this->transform($loantype, LoanTypeTransformer::class);
    }

    /**
     * @param DeleteLoanTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLoanType(DeleteLoanTypeRequest $request)
    {
        Apiato::call('LoanType@DeleteLoanTypeAction', [$request]);

        return $this->noContent();
    }
}
