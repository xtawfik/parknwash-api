<?php

namespace App\Containers\Account\Tasks;

use App\Containers\Account\Data\Repositories\AccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccountTask extends Task
{

    protected $repository;

    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

