<?php

namespace App\Containers\CapitalTransaction\UI\API\Controllers;

use App\Containers\CapitalTransaction\UI\API\Requests\CreateCapitalTransactionRequest;
use App\Containers\CapitalTransaction\UI\API\Requests\DeleteCapitalTransactionRequest;
use App\Containers\CapitalTransaction\UI\API\Requests\GetAllCapitalTransactionsRequest;
use App\Containers\CapitalTransaction\UI\API\Requests\FindCapitalTransactionByIdRequest;
use App\Containers\CapitalTransaction\UI\API\Requests\UpdateCapitalTransactionRequest;
use App\Containers\CapitalTransaction\UI\API\Transformers\CapitalTransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\CapitalTransaction\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCapitalTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCapitalTransaction(CreateCapitalTransactionRequest $request)
    {
        $capitaltransaction = Apiato::call('CapitalTransaction@CreateCapitalTransactionAction', [$request]);

        $this->uploadMedia( $capitaltransaction, "image", true );
        $this->uploadMedia( $capitaltransaction, "gallery" );
        $this->uploadMedia( $capitaltransaction, "file" );

        return $this->created($this->transform($capitaltransaction, CapitalTransactionTransformer::class));
    }

    /**
     * @param FindCapitalTransactionByIdRequest $request
     * @return array
     */
    public function findCapitalTransactionById(FindCapitalTransactionByIdRequest $request)
    {
        $capitaltransaction = Apiato::call('CapitalTransaction@FindCapitalTransactionByIdAction', [$request]);

        return $this->transform($capitaltransaction, CapitalTransactionTransformer::class);
    }

    /**
     * @param GetAllCapitalTransactionsRequest $request
     * @return array
     */
    public function getAllCapitalTransactions(GetAllCapitalTransactionsRequest $request)
    {
        $capitaltransactions = Apiato::call('CapitalTransaction@GetAllCapitalTransactionsAction', [$request]);

        return $this->transform($capitaltransactions, CapitalTransactionTransformer::class);
    }

    /**
     * @param UpdateCapitalTransactionRequest $request
     * @return array
     */
    public function updateCapitalTransaction(UpdateCapitalTransactionRequest $request)
    {
        $capitaltransaction = Apiato::call('CapitalTransaction@UpdateCapitalTransactionAction', [$request]);

        $this->uploadMedia( $capitaltransaction, "image", true );
        $this->uploadMedia( $capitaltransaction, "gallery" );
        $this->uploadMedia( $capitaltransaction, "file" );

        return $this->transform($capitaltransaction, CapitalTransactionTransformer::class);
    }

    /**
     * @param DeleteCapitalTransactionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCapitalTransaction(DeleteCapitalTransactionRequest $request)
    {
        Apiato::call('CapitalTransaction@DeleteCapitalTransactionAction', [$request]);

        return $this->noContent();
    }
}
