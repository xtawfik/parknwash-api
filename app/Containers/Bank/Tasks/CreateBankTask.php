<?php

namespace App\Containers\Bank\Tasks;

use App\Containers\Bank\Data\Repositories\BankRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBankTask extends Task
{

    protected $repository;

    public function __construct(BankRepository $repository)
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

