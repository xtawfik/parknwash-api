<?php

namespace App\Containers\AccBankAccount\Tasks;

use App\Containers\AccBankAccount\Data\Repositories\AccBankAccountRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccBankAccountsTask extends Task
{

    protected $repository;

    public function __construct(AccBankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
