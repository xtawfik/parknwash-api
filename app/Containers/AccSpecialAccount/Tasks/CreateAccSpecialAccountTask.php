<?php

namespace App\Containers\AccSpecialAccount\Tasks;

use App\Containers\AccSpecialAccount\Data\Repositories\AccSpecialAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccSpecialAccountTask extends Task
{

    protected $repository;

    public function __construct(AccSpecialAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

