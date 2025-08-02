<?php

namespace App\Containers\AccControlAccount\Tasks;

use App\Containers\AccControlAccount\Data\Repositories\AccControlAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccControlAccountTask extends Task
{

    protected $repository;

    public function __construct(AccControlAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

