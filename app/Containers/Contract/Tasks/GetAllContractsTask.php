<?php

namespace App\Containers\Contract\Tasks;

use App\Containers\Contract\Data\Repositories\ContractRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllContractsTask extends Task
{

    protected $repository;

    public function __construct(ContractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
