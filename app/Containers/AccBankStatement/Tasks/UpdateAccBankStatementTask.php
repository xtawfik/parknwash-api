<?php

namespace App\Containers\AccBankStatement\Tasks;

use App\Containers\AccBankStatement\Data\Repositories\AccBankStatementRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccBankStatementTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

