<?php

namespace App\Containers\AccCapitalSubAccount\Tasks;

use App\Containers\AccCapitalSubAccount\Data\Repositories\AccCapitalSubAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccCapitalSubAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalSubAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

