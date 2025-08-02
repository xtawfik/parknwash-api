<?php

namespace App\Containers\AccCurrency\Tasks;

use App\Containers\AccCurrency\Data\Repositories\AccCurrencyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrenciesTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
