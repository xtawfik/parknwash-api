<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Tasks;

use App\Containers\AccCurrencyExchangeTransaction\Data\Repositories\AccCurrencyExchangeTransactionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyExchangeTransactionTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

