<?php

namespace App\Containers\AccCurrencyCurrency\Tasks;

use App\Containers\AccCurrencyCurrency\Data\Repositories\AccCurrencyCurrencyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyCurrencyTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

