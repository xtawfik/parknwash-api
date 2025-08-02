<?php

namespace App\Containers\AccSpecialAccount\Tasks;

use App\Containers\AccSpecialAccount\Data\Repositories\AccSpecialAccountRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccSpecialAccountsTask extends Task
{

    protected $repository;

    public function __construct(AccSpecialAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
