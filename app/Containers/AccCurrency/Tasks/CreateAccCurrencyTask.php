<?php

namespace App\Containers\AccCurrency\Tasks;

use App\Containers\AccCurrency\Data\Repositories\AccCurrencyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCurrencyTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

