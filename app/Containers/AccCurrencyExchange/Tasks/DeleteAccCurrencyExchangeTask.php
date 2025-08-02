<?php

namespace App\Containers\AccCurrencyExchange\Tasks;

use App\Containers\AccCurrencyExchange\Data\Repositories\AccCurrencyExchangeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCurrencyExchangeTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
