<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Tasks;

use App\Containers\AccCurrencyExchangeTransaction\Data\Repositories\AccCurrencyExchangeTransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyExchangeTransactionTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

