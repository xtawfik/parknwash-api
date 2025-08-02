<?php

namespace App\Containers\AccControlAccount\Tasks;

use App\Containers\AccControlAccount\Data\Repositories\AccControlAccountRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccControlAccountsTask extends Task
{

    protected $repository;

    public function __construct(AccControlAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
