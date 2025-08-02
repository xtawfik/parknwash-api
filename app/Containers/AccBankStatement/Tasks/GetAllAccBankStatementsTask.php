<?php

namespace App\Containers\AccBankStatement\Tasks;

use App\Containers\AccBankStatement\Data\Repositories\AccBankStatementRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccBankStatementsTask extends Task
{

    protected $repository;

    public function __construct(AccBankStatementRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
