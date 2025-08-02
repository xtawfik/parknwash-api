<?php

namespace App\Containers\Bank\Tasks;

use App\Containers\Bank\Data\Repositories\BankRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBankTask extends Task
{

    protected $repository;

    public function __construct(BankRepository $repository)
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

