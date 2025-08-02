<?php

namespace App\Containers\AccCapitalAccount\Tasks;

use App\Containers\AccCapitalAccount\Data\Repositories\AccCapitalAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccCapitalAccountTask extends Task
{

    protected $repository;

    public function __construct(AccCapitalAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

