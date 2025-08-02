<?php

namespace App\Containers\AccBankAccount\Tasks;

use App\Containers\AccBankAccount\Data\Repositories\AccBankAccountRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccBankAccountTask extends Task
{

    protected $repository;

    public function __construct(AccBankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

