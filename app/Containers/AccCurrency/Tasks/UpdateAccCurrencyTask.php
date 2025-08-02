<?php

namespace App\Containers\AccCurrency\Tasks;

use App\Containers\AccCurrency\Data\Repositories\AccCurrencyRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCurrencyTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

