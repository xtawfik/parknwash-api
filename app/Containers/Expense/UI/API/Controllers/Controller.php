<?php

namespace App\Containers\Expense\UI\API\Controllers;

use App\Containers\Expense\UI\API\Requests\CreateExpenseRequest;
use App\Containers\Expense\UI\API\Requests\DeleteExpenseRequest;
use App\Containers\Expense\UI\API\Requests\GetAllExpensesRequest;
use App\Containers\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Containers\Expense\UI\API\Requests\UpdateExpenseRequest;
use App\Containers\Expense\UI\API\Transformers\ExpenseTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Expense\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateExpenseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createExpense(CreateExpenseRequest $request)
    {
        $expense = Apiato::call('Expense@CreateExpenseAction', [$request]);

        $this->uploadMedia( $expense, "image", true );
        $this->uploadMedia( $expense, "gallery" );
        $this->uploadMedia( $expense, "file" );

        return $this->created($this->transform($expense, ExpenseTransformer::class));
    }

    /**
     * @param FindExpenseByIdRequest $request
     * @return array
     */
    public function findExpenseById(FindExpenseByIdRequest $request)
    {
        $expense = Apiato::call('Expense@FindExpenseByIdAction', [$request]);

        return $this->transform($expense, ExpenseTransformer::class);
    }

    /**
     * @param GetAllExpensesRequest $request
     * @return array
     */
    public function getAllExpenses(GetAllExpensesRequest $request)
    {
        $expenses = Apiato::call('Expense@GetAllExpensesAction', [$request]);

        return $this->transform($expenses, ExpenseTransformer::class);
    }

    /**
     * @param UpdateExpenseRequest $request
     * @return array
     */
    public function updateExpense(UpdateExpenseRequest $request)
    {
        $expense = Apiato::call('Expense@UpdateExpenseAction', [$request]);

        $this->uploadMedia( $expense, "image", true );
        $this->uploadMedia( $expense, "gallery" );
        $this->uploadMedia( $expense, "file" );

        return $this->transform($expense, ExpenseTransformer::class);
    }

    /**
     * @param DeleteExpenseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteExpense(DeleteExpenseRequest $request)
    {
        Apiato::call('Expense@DeleteExpenseAction', [$request]);

        return $this->noContent();
    }
}
