<?php

namespace App\Containers\AccCurrencyExchange\Tasks;

use App\Containers\AccCurrencyExchange\Data\Repositories\AccCurrencyExchangeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyExchangeTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

