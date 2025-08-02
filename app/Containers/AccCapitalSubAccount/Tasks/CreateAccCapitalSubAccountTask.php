<?php

namespace App\Containers\AccCapitalSubAccount\Tasks;

use App\Containers\AccCapitalSubAccount\Data\Repositories\AccCapitalSubAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCapitalSubAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalSubAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

