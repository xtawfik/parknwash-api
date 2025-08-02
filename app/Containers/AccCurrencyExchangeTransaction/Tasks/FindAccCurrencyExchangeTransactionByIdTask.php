<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Tasks;

use App\Containers\AccCurrencyExchangeTransaction\Data\Repositories\AccCurrencyExchangeTransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyExchangeTransactionByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
