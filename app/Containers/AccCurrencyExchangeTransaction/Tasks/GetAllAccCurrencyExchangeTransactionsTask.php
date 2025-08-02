<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Tasks;

use App\Containers\AccCurrencyExchangeTransaction\Data\Repositories\AccCurrencyExchangeTransactionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrencyExchangeTransactionsTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
