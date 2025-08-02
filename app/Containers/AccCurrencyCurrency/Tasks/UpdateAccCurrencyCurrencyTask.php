<?php

namespace App\Containers\AccCurrencyCurrency\Tasks;

use App\Containers\AccCurrencyCurrency\Data\Repositories\AccCurrencyCurrencyRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyCurrencyTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

