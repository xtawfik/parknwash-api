<?php

namespace App\Containers\AccRecurringTransaction\UI\API\Controllers;

use App\Containers\AccRecurringTransaction\UI\API\Requests\CreateAccRecurringTransactionRequest;
use App\Containers\AccRecurringTransaction\UI\API\Requests\DeleteAccRecurringTransactionRequest;
use App\Containers\AccRecurringTransaction\UI\API\Requests\GetAllAccRecurringTransactionsRequest;
use App\Containers\AccRecurringTransaction\UI\API\Requests\FindAccRecurringTransactionByIdRequest;
use App\Containers\AccRecurringTransaction\UI\API\Requests\UpdateAccRecurringTransactionRequest;
use App\Containers\AccRecurringTransaction\UI\API\Transformers\AccRecurringTransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccRecurringTransaction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccRecurringTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccRecurringTransaction(CreateAccRecurringTransactionRequest $request)
    {
        $accrecurringtransaction = Apiato::call('AccRecurringTransaction@CreateAccRecurringTransactionAction', [$request]);

        $this->uploadMedia( $accrecurringtransaction, "image", true );
        $this->uploadMedia( $accrecurringtransaction, "gallery" );
        $this->uploadMedia( $accrecurringtransaction, "file" );

        return $this->created($this->transform($accrecurringtransaction, AccRecurringTransactionTransformer::class));
    }

    /**
     * @param FindAccRecurringTransactionByIdRequest $request
     * @return array
     */
    public function findAccRecurringTransactionById(FindAccRecurringTransactionByIdRequest $request)
    {
        $accrecurringtransaction = Apiato::call('AccRecurringTransaction@FindAccRecurringTransactionByIdAction', [$request]);

        return $this->transform($accrecurringtransaction, AccRecurringTransactionTransformer::class);
    }

    /**
     * @param GetAllAccRecurringTransactionsRequest $request
     * @return array
     */
    public function getAllAccRecurringTransactions(GetAllAccRecurringTransactionsRequest $request)
    {
        $accrecurringtransactions = Apiato::call('AccRecurringTransaction@GetAllAccRecurringTransactionsAction', [$request]);

        return $this->transform($accrecurringtransactions, AccRecurringTransactionTransformer::class);
    }

    /**
     * @param UpdateAccRecurringTransactionRequest $request
     * @return array
     */
    public function updateAccRecurringTransaction(UpdateAccRecurringTransactionRequest $request)
    {
        $accrecurringtransaction = Apiato::call('AccRecurringTransaction@UpdateAccRecurringTransactionAction', [$request]);

        $this->uploadMedia( $accrecurringtransaction, "image", true );
        $this->uploadMedia( $accrecurringtransaction, "gallery" );
        $this->uploadMedia( $accrecurringtransaction, "file" );

        return $this->transform($accrecurringtransaction, AccRecurringTransactionTransformer::class);
    }

    /**
     * @param DeleteAccRecurringTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccRecurringTransaction(DeleteAccRecurringTransactionRequest $request)
    {
        Apiato::call('AccRecurringTransaction@DeleteAccRecurringTransactionAction', [$request]);

        return $this->noContent();
    }
}
