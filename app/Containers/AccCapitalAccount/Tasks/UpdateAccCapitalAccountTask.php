<?php

namespace App\Containers\AccCapitalAccount\Tasks;

use App\Containers\AccCapitalAccount\Data\Repositories\AccCapitalAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCapitalAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

