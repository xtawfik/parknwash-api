<?php

namespace App\Containers\AccBankStatement\Tasks;

use App\Containers\AccBankStatement\Data\Repositories\AccBankStatementRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccBankStatementByIdTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
