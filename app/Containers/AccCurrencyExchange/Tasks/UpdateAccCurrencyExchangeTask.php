<?php

namespace App\Containers\AccCurrencyExchange\Tasks;

use App\Containers\AccCurrencyExchange\Data\Repositories\AccCurrencyExchangeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyExchangeTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

