<?php

namespace App\Containers\Loan\UI\API\Controllers;

use App\Containers\Loan\UI\API\Requests\CreateLoanRequest;
use App\Containers\Loan\UI\API\Requests\DeleteLoanRequest;
use App\Containers\Loan\UI\API\Requests\GetAllLoansRequest;
use App\Containers\Loan\UI\API\Requests\FindLoanByIdRequest;
use App\Containers\Loan\UI\API\Requests\UpdateLoanRequest;
use App\Containers\Loan\UI\API\Transformers\LoanTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Loan\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateLoanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLoan(CreateLoanRequest $request)
    {
        $loan = Apiato::call('Loan@CreateLoanAction', [$request]);

        $this->uploadMedia( $loan, "image", true );
        $this->uploadMedia( $loan, "gallery" );
        $this->uploadMedia( $loan, "file" );

        return $this->created($this->transform($loan, LoanTransformer::class));
    }

    /**
     * @param FindLoanByIdRequest $request
     * @return array
     */
    public function findLoanById(FindLoanByIdRequest $request)
    {
        $loan = Apiato::call('Loan@FindLoanByIdAction', [$request]);

        return $this->transform($loan, LoanTransformer::class);
    }

    /**
     * @param GetAllLoansRequest $request
     * @return array
     */
    public function getAllLoans(GetAllLoansRequest $request)
    {
        $loans = Apiato::call('Loan@GetAllLoansAction', [$request]);

        return $this->transform($loans, LoanTransformer::class);
    }

    /**
     * @param UpdateLoanRequest $request
     * @return array
     */
    public function updateLoan(UpdateLoanRequest $request)
    {
        $loan = Apiato::call('Loan@UpdateLoanAction', [$request]);

        $this->uploadMedia( $loan, "image", true );
        $this->uploadMedia( $loan, "gallery" );
        $this->uploadMedia( $loan, "file" );

        return $this->transform($loan, LoanTransformer::class);
    }

    /**
     * @param DeleteLoanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLoan(DeleteLoanRequest $request)
    {
        Apiato::call('Loan@DeleteLoanAction', [$request]);

        return $this->noContent();
    }
}
