<?php

namespace App\Containers\AccCurrencyExchangeTransaction\UI\API\Controllers;

use App\Containers\AccCurrencyExchangeTransaction\UI\API\Requests\CreateAccCurrencyExchangeTransactionRequest;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Requests\DeleteAccCurrencyExchangeTransactionRequest;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Requests\GetAllAccCurrencyExchangeTransactionsRequest;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Requests\FindAccCurrencyExchangeTransactionByIdRequest;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Requests\UpdateAccCurrencyExchangeTransactionRequest;
use App\Containers\AccCurrencyExchangeTransaction\UI\API\Transformers\AccCurrencyExchangeTransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccCurrencyExchangeTransaction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccCurrencyExchangeTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccCurrencyExchangeTransaction(CreateAccCurrencyExchangeTransactionRequest $request)
    {
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@CreateAccCurrencyExchangeTransactionAction', [$request]);

        $this->uploadMedia( $acccurrencyexchangetransaction, "image", true );
        $this->uploadMedia( $acccurrencyexchangetransaction, "gallery" );
        $this->uploadMedia( $acccurrencyexchangetransaction, "file" );

        return $this->created($this->transform($acccurrencyexchangetransaction, AccCurrencyExchangeTransactionTransformer::class));
    }

    /**
     * @param FindAccCurrencyExchangeTransactionByIdRequest $request
     * @return array
     */
    public function findAccCurrencyExchangeTransactionById(FindAccCurrencyExchangeTransactionByIdRequest $request)
    {
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@FindAccCurrencyExchangeTransactionByIdAction', [$request]);

        return $this->transform($acccurrencyexchangetransaction, AccCurrencyExchangeTransactionTransformer::class);
    }

    /**
     * @param GetAllAccCurrencyExchangeTransactionsRequest $request
     * @return array
     */
    public function getAllAccCurrencyExchangeTransactions(GetAllAccCurrencyExchangeTransactionsRequest $request)
    {
        $acccurrencyexchangetransactions = Apiato::call('AccCurrencyExchangeTransaction@GetAllAccCurrencyExchangeTransactionsAction', [$request]);

        return $this->transform($acccurrencyexchangetransactions, AccCurrencyExchangeTransactionTransformer::class);
    }

    /**
     * @param UpdateAccCurrencyExchangeTransactionRequest $request
     * @return array
     */
    public function updateAccCurrencyExchangeTransaction(UpdateAccCurrencyExchangeTransactionRequest $request)
    {
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@UpdateAccCurrencyExchangeTransactionAction', [$request]);

        $this->uploadMedia( $acccurrencyexchangetransaction, "image", true );
        $this->uploadMedia( $acccurrencyexchangetransaction, "gallery" );
        $this->uploadMedia( $acccurrencyexchangetransaction, "file" );

        return $this->transform($acccurrencyexchangetransaction, AccCurrencyExchangeTransactionTransformer::class);
    }

    /**
     * @param DeleteAccCurrencyExchangeTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccCurrencyExchangeTransaction(DeleteAccCurrencyExchangeTransactionRequest $request)
    {
        Apiato::call('AccCurrencyExchangeTransaction@DeleteAccCurrencyExchangeTransactionAction', [$request]);

        return $this->noContent();
    }
}
