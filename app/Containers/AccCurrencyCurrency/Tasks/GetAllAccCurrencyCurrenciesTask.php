<?php

namespace App\Containers\AccCurrencyCurrency\Tasks;

use App\Containers\AccCurrencyCurrency\Data\Repositories\AccCurrencyCurrencyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCurrencyCurrenciesTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
