<?php

namespace App\Containers\AccCurrencyExchange\Tasks;

use App\Containers\AccCurrencyExchange\Data\Repositories\AccCurrencyExchangeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrencyExchangesTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
