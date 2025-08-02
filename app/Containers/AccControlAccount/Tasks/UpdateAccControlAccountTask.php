<?php

namespace App\Containers\AccControlAccount\Tasks;

use App\Containers\AccControlAccount\Data\Repositories\AccControlAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccControlAccountTask extends Task
{

    protected $repository;

    public function __construct(AccControlAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

